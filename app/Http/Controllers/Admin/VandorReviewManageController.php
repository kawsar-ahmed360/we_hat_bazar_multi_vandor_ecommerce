<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VandorApproveMail\approve_mail;
use App\Models\Admin;
use App\Models\Admin\Setting;
use App\Models\Client\Order;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use App\Models\VandorPaymentRequest;
use App\View\Components\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\ProductManage;
use App\Models\Admin\SectionManage;
use App\Models\Admin\ColorManage;
use App\Models\Admin\TagManage;
use App\Models\Admin\Plating;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductDetail;
use Image;

class VandorReviewManageController extends Controller
{
    public function VandorRreview(){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','0')->get();
        return view('AdminDashboard.VandorReview.all-vandor',$data);
    }

    public function VandorViewInformation($shop_id){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor_info'] = Vandor::where('shop_id',$shop_id)->first();

        return view('AdminDashboard.VandorReview.single-vandor-info',$data);
    }

    public function VandorAdminApprove($shop_id){
        $data['vandor_info'] = Vandor::where('shop_id',$shop_id)->first();
        $data['vandor_info']->super_admin_status =1;
        $data['vandor_info']->save();

        $mail_info = Vandor::where('shop_id',$shop_id)->first();

        $data = array(
            'Email'      =>  $mail_info->email,
            'fname'   =>   $mail_info->f_name,
            'shopId'   =>   $mail_info->shop_id,
            'shopName'   =>   $mail_info->shop_name,
        );

        Mail::to($data['Email'])->send(new approve_mail($data));

        return redirect()->route('VandorRreview');

    }

    public function VandorAdminApproveList(){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->get();
        return view('AdminDashboard.VandorReview.all-approve-vandor-list',$data);
    }

    //---------------------Vandor Pnael Section---------------

    public function VandorPanel($shop_id){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$shop_id)->first();

        return view('AdminDashboard.VandorPanel.panel-view',$data);
    }

    //--------------------Vandor Category Permission----------------

    public function VandorCategoryPermissionEs($shop_id){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$shop_id)->first();
        $data['category'] = Admin\CategoryManage::get();
        $data['permission_category'] = VandorCategoryPermission::where('shop_id',$shop_id)->first();

        if($data['permission_category']!=null){
            $data['permission_category'] = VandorCategoryPermission::where('shop_id',$shop_id)->first()->cat_id;
            $json_dec = json_decode(@$data['permission_category']);
            $data['permission_category'] =$json_dec;
        }


        return view('AdminDashboard.VandorPanel.vandor-category-permission',$data);
    }

    public function VandorCategoryPermissionSubmit(Request $request){


        $exist = VandorCategoryPermission::where('shop_id',$request->shop_id)->exists();

        if($exist){

            $store = VandorCategoryPermission::where('shop_id',$request->shop_id)->first();
            $store->shop_id = $request->shop_id;
            $store->cat_id = json_encode($request->cat_id);
            $store->save();
        }else{

            $store = new VandorCategoryPermission();
            $store->shop_id = $request->shop_id;
            $store->shop_name = $request->shop_name;
            $store->cat_id = json_encode($request->cat_id);
            $store->save();
        }

        return redirect()->back();

    }

    //------------------Vandor Product Manage-----------------

    public function VandorPanelProductPage($shop_id){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$shop_id)->first();

        return view('AdminDashboard.VandorPanel.vandor-product-page',$data);
    }

    public function VandorPanelProductAdd($shop_id){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$shop_id)->first();

        $data['category'] = VandorCategoryPermission::where('shop_id',$shop_id)->first();
        if($data['category']!=null){
            $data['category'] = VandorCategoryPermission::where('shop_id',$shop_id)->first()->cat_id;
            $conv = json_decode($data['category']);
            $data['category'] = Admin\CategoryManage::whereIn('id',$conv)->get();
        }



        return view('AdminDashboard.VandorPanel.vandor-add-product',$data);

    }

    public function VandorPanelProductStore(Request $request){

        $request->validate([
            'product_name'=>'required',
            'section_id'=>'required',
            'cat_id'=>'required',
            'product_price'=>'required',
            'product_sku'=>'required',
            'commission'=>'required',
            'inc_commission_price'=>'required',
            'shop_id'=>'required',
        ]);

        $store = new Admin\ProductManage();
        $store->product_name = $request->product_name;
        $store->section_id = json_encode($request->section_id);
        $store->cat_id = $request->cat_id;
        $store->color_id = json_encode($request->color_id);
        $store->tag_id = json_encode($request->tag_id);
        $store->plation_id = json_encode($request->plation_id);
        $store->carat = $request->carat;
        $store->product_price = $request->product_price;
        $store->product_sku = $request->product_sku;
        $store->summary = $request->summary;
        $store->status = $request->status;
        $store->slug = str_slug($request->product_name);
        $store->meta_title = $request->meta_title;
        $store->meta_des = $request->meta_des;
        $store->commission = $request->commission;
        $store->inc_commission_price = $request->inc_commission_price;
        $store->shop_id = $request->shop_id;
        $store->status = 2;
        $store->save();


        $unique = uniqid();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fullname = time().'.'.$image->getClientOriginalExtension();
            @unlink('upload/Client/Product/'.$store->image);
            Image::make($image)->resize(440,440)->save('upload/Client/Product/'.$fullname);
            $store->image = $fullname;
            $store->save();
        }


        if($request->hasFile('product_gallery')){
//            $old_gallery =ProductGallery::where('product_id',$request->EditeId)->get();
//            foreach(@$old_gallery as $key=>$gallery){
//                @unlink('upload/Client/ProductGallery/'.$gallery->product_gallery);
//                $gallery->delete();
//            }
            $random = rand(00000,99999);
            $size = 'basic';
            $gallery = $request->file('product_gallery');
            foreach(@$gallery as $key=>$gall){
                $fullGallery = time().'.'.$key.'.'.$unique.'.'.$random.'.'.$size.'.'.$gall->getClientOriginalExtension();
                Image::make($gall)->resize(515,515)->save('upload/Client/ProductGallery/'.$fullGallery);
                $galleryStore = new ProductGallery();
                $galleryStore->product_id = $store->id;
                $galleryStore->product_gallery = $fullGallery;
                $galleryStore->save();
            }

        }

        return redirect()->route('VandorPanelProductAll',$store->shop_id);
    }

    public function VandorPanelProductEdit($id){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['edite'] = ProductManage::where('id',$id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$data['edite']->shop_id)->first();

        $data['category'] = VandorCategoryPermission::where('shop_id',$data['edite']->shop_id)->first()->cat_id;
        $conv = json_decode($data['category']);
        $data['category'] = Admin\CategoryManage::whereIn('id',$conv)->get();
        //----------------Section Decode-------------
        $section_decode = ProductManage::where('id',$id)->first()->section_id;
        $section_decode_arr = json_decode($section_decode);
        $data['section_edite'] = SectionManage::whereIn('id',$section_decode_arr)->get();
        //----------------Color Decode-------------
        $color_decode = ProductManage::where('id',$id)->first()->color_id;
        $color_decode_arr = json_decode($color_decode);
        $data['color_edite'] = ColorManage::whereIn('id',$color_decode_arr)->get();
        //----------------Tag Decode-------------
        $tag_decode = ProductManage::where('id',$id)->first()->tag_id;
        $tag_decode_arr = json_decode($tag_decode);
        $data['tag_edite'] = TagManage::whereIn('id',$tag_decode_arr)->get();
        //----------------Plating Decode-------------
        $plating_decode = ProductManage::where('id',$id)->first()->plation_id;
        $plating_decode_arr = json_decode($plating_decode);
        $data['plating_edite'] = Plating::whereIn('id',$plating_decode_arr)->get();
        //------------------Gallery Section---------------
        $data['gallery'] = ProductGallery::where('product_id',$id)->get();

        return view('AdminDashboard.VandorPanel.vandor-edit-product',$data);
    }

    public function VandorPanelProductUpdate(Request $request){

        $request->validate([
            'product_name'=>'required',
            'section_id'=>'required',
            'cat_id'=>'required',
            'product_price'=>'required',
            'product_sku'=>'required',
            'commission'=>'required',
            'inc_commission_price'=>'required',
            'shop_id'=>'required',
        ]);

        $store = Admin\ProductManage::where('id',$request->EditeId)->first();
        $store->product_name = $request->product_name;
        $store->section_id = json_encode($request->section_id);
        $store->cat_id = $request->cat_id;
        $store->color_id = json_encode($request->color_id);
        $store->tag_id = json_encode($request->tag_id);
        $store->plation_id = json_encode($request->plation_id);
        $store->carat = $request->carat;
        $store->product_price = $request->product_price;
        $store->product_sku = $request->product_sku;
        $store->summary = $request->summary;
        $store->status = $request->status;
        $store->slug = str_slug($request->product_name);
        $store->meta_title = $request->meta_title;
        $store->meta_des = $request->meta_des;
        $store->commission = $request->commission;
        $store->inc_commission_price = $request->inc_commission_price;
        $store->shop_id = $request->shop_id;
        $store->status = 2;
        $store->save();


        $unique = uniqid();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fullname = time().'.'.$image->getClientOriginalExtension();
            @unlink('upload/Client/Product/'.$store->image);
            Image::make($image)->resize(440,440)->save('upload/Client/Product/'.$fullname);
            $store->image = $fullname;
            $store->save();
        }


        if($request->hasFile('product_gallery')){
            $old_gallery =ProductGallery::where('product_id',$request->EditeId)->get();
            foreach(@$old_gallery as $key=>$gallery){
                @unlink('upload/Client/ProductGallery/'.$gallery->product_gallery);
                $gallery->delete();
            }
            $random = rand(00000,99999);
            $size = 'basic';
            $gallery = $request->file('product_gallery');
            foreach(@$gallery as $key=>$gall){
                $fullGallery = time().'.'.$key.'.'.$unique.'.'.$random.'.'.$size.'.'.$gall->getClientOriginalExtension();
                Image::make($gall)->resize(515,515)->save('upload/Client/ProductGallery/'.$fullGallery);
                $galleryStore = new ProductGallery();
                $galleryStore->product_id = $store->id;
                $galleryStore->product_gallery = $fullGallery;
                $galleryStore->save();
            }

        }

        return redirect()->route('VandorPanelProductAll',$store->shop_id);
    }

    public function VandorPanelProductDelete($id){

        $pro = ProductManage::where('id',$id)->first();
        if($pro){
            @unlink('upload/Client/Product/'.$pro->image);
        }
        $gall = ProductGallery::where('product_id',$id)->get();
        foreach (@$gall as $g){
            @unlink('upload/Client/ProductGallery/'.$g->product_gallery);
            $g->delete();
        }
        ProductManage::where('id',$id)->delete();

        $noti = array(
            'message'=>'successfully Delete',
            'alert-type'=>'success'
        );
        return redirect()->route('VandorPanelProductAll',$pro->shop_id);
    }

    //----------------Vandor Product View--------------
    public function VandorPanelProductAll($shop_id){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$shop_id)->first();
        $data['product'] = Admin\ProductManage::where('shop_id',$shop_id)->get();
        return view('AdminDashboard.VandorPanel.vandor-all-product',$data);
    }

    public function VandorPanelProductAddMore($id){
        $product = ProductManage::where('id',$id)->first();

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$product->shop_id)->first();
        $data['product'] = Admin\ProductManage::where('shop_id',$product->shop_id)->where('id',$id)->first();
        $data['product_details'] = ProductDetail::where('product_id',$id)->get();

        return view('AdminDashboard.VandorPanel.vandor-product-add-more',$data);

    }

    public function VandorPanelProductAddMoreUpdate(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $count = count($request->title);

        if($count<1){
            $noti = array(
                'message'=>'data field null',
                'alert-type'=>'error'
            );
        }else{
            if($request->EditeId!=null){

                $delete = ProductDetail::where('product_id',$request->product_id)->delete();
                foreach (@$request->title as $key=>$title){
                    $store = new ProductDetail();
                    $store->product_id = $request->product_id;
                    $store->title = $title;
                    $store->description = $request->description[$key];
                    $store->save();
                }

                $noti = array(
                    'message'=>'Successfully Updated',
                    'alert-type'=>'error'
                );
            }else{

                foreach (@$request->title as $key=>$title){
                    $store = new ProductDetail();
                    $store->product_id = $request->product_id;
                    $store->title = $title;
                    $store->description = $request->description[$key];
                    $store->save();
                }

                $noti = array(
                    'message'=>'Successfully Created',
                    'alert-type'=>'error'
                );
            }

            $pro = ProductManage::where('id',$request->product_id)->first();
            return redirect()->route('VandorPanelProductAll',$pro->shop_id);
        }
    }


    public function VandorPanelProductDiscount($id){

        $shop_id = ProductManage::where('id',$id)->first()->shop_id;
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$shop_id)->first();
        $data['product'] = Admin\ProductManage::where('id',$id)->first();
        return view('AdminDashboard.VandorPanel.vandor-product-discount',$data);

    }

    public function VandorPanelProductDiscountPost(Request $request){

        $update = ProductManage::where('id',$request->productId)->first();
        $update->discount = $request->discount;
        $update->new_price = $request->new_price;
        $update->commission = $request->commission;
        $update->inc_commission_price = $request->inc_commission_price;
        $update->save();

        $noti = array(
            'message'=>'Your Product Discount successfully Added',
            'alert-type'=>'success'
        );

        return redirect()->route('VandorPanelProductAll',$update->shop_id);
    }

    //-------------------Vandor Panding Status--------------------

    public function VandorStatusPanding($shop_id,$id){

        $status = Vandor::where('id',$id)->where('shop_id',$shop_id)->first();
        $status->super_admin_status =0;
        $status->save();

        return redirect()->back();
    }

    //---------------------Vandor Delete Controller--------------

    public function VandorViewDelete($shop_id,$id){

       $del = Vandor::where('id',$id)->where('shop_id',$shop_id)->first();
       if($del){

           @unlink('upload/Vandor/shop_image/'.$del->shop_image);
           @unlink('upload/Vandor/profile/'.$del->profile);
           @unlink('upload/Vandor/shop_banner/'.$del->shop_banner);
           Vandor::where('id',$id)->where('shop_id',$shop_id)->delete();
       }

        return redirect()->back();
    }

    //--------------------Vandor Payment Widrow Section----------

    public function VandorPanelPaymentWidrowPage($shop_id,$id)
    {

        $data['logo'] = Setting::where('id', '1')->first();
        $data['info'] = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('id', $id)->where('shop_id', $shop_id)->first();
        $shop_id = Vandor::where('id', $id)->where('shop_id', $shop_id)->first()->shop_id;
        $data['order'] = Order::where('shop_id', 'LIKE', "%$shop_id%")->get();


        foreach ($data['order'] as $key => $or){

        $data['total_income'] = \App\Models\Client\OrderDetail::where('shop_id', $shop_id)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('subtotal');
        $data['comission_price'] = \App\Models\Client\OrderDetail::where('shop_id', $shop_id)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('comm_price');
        $data['with_out_comission'] = $data['total_income']-$data['comission_price'];


       }


        $data['shop_id'] = $shop_id;
        $data['user_id'] = $id;
        return view('AdminDashboard.VandorWidrow.widrow_page',$data);

    }

    public function VandorPanelPaymentWidrowDateWiseReport(Request $request){

        $from    = Carbon::parse($request->s_date)
            ->startOfDay()        // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $to      = Carbon::parse($request->e_date)
            ->endOfDay()          // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59



        $data['logo'] = Setting::where('id', '1')->first();
        $data['info'] = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('id', $request->user_id)->where('shop_id', $request->shop_id)->first();
        $shop_id = Vandor::where('id',$request->user_id)->where('shop_id',$request->shop_id)->first()->shop_id;
        $data['order'] = Order::where('shop_id', 'LIKE', "%$shop_id%")->get();


        foreach ($data['order'] as $key => $or){

            $data['total_income'] = \App\Models\Client\OrderDetail::where('shop_id',$request->shop_id)->whereBetween('created_at',[$from,$to])->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('subtotal');
            $data['comission_price'] = \App\Models\Client\OrderDetail::where('shop_id',$request->shop_id)->whereBetween('created_at',[$from,$to])->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('comm_price');
            $data['with_out_comission'] = $data['total_income']-$data['comission_price'];
        }

        $data['shop_id'] = $request->shop_id;
        $data['user_id'] = $request->id;

        return response()->json(['total_income'=>$data['total_income'],'comission_price'=>$data['comission_price'],'with_out_comission'=>$data['with_out_comission']]);

    }


    //------------------Vandor WithDrown Request ALl View---------------

    public function VandorPanelPaymentWithdrownRequestAll(){

        $data['logo'] = Setting::where('id', '1')->first();
        $data['info'] = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        $data['panding_windrown_list'] =  VandorPaymentRequest::where('status','1')->OrderBy('id','desc')->get();

        return view('AdminDashboard.VandorWidrow.all_withdrown_panding_list',$data);
    }

    public function VandorPanelPaymentWithdrawPanding($shop_id,$user_id){

        return $shop_id;
    }
}
