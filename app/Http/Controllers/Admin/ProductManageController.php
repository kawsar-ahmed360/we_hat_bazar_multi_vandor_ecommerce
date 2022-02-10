<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\ProductManage;
use App\Models\Admin\Setting;
use App\Models\ColorImageLinkUp;
use Faker\Provider\ar_SA\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\ColorManage;
use App\Models\Admin\TagManage;
use App\Models\Admin\Plating;
use App\Models\Admin\SectionManage;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductDetail;

class ProductManageController extends Controller
{
    public function ProductCreate(){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['category'] = CategoryManage::get();
        $data['color'] = ColorManage::get();
        $data['tag'] = TagManage::get();
        $data['plation'] = Plating::get();
        $data['section'] = SectionManage::get();
        return view('AdminDashboard.Product.create',$data);
    }

    public function ProductIndex(){
        $data['product'] = ProductManage::OrderBy('id','desc')->get();

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('AdminDashboard.Product.index',$data);
    }

    public function ProductStore(Request $request){

        $request->validate([

        ]);
        $store = new ProductManage();
        $this->save($store,$request);

        $noti = array(
            'message'=>'successfully Created',
            'alert-type'=>'success'
        );
        return redirect()->route('ProductIndex')->with($noti);

    }

    public function ProductEdite($id){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['category'] = CategoryManage::get();
        $data['color'] = ColorManage::get();
        $data['tag'] = TagManage::get();
        $data['plation'] = Plating::get();
        $data['section'] = SectionManage::get();
        $data['edite'] = ProductManage::where('id',$id)->first();
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

        return view('AdminDashboard.Product.edite',$data);
    }

    public function ProductUpdate(Request $request){

        $request->validate([

        ]);

        $store = ProductManage::where('id',$request->EditeId)->first();
        $this->save($store,$request);
        $noti = array(
            'message'=>'successfully Updated',
            'alert-type'=>'success'
        );
        return redirect()->route('ProductIndex')->with($noti);
    }

    private function save(ProductManage $store,Request $request){

        DB::transaction(function () use($request,$store){

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

        });
    }

    public function ProductDelete($id){

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
        return redirect()->route('ProductIndex')->with($noti);
    }

    public function ProductApprove(){
        $data['product'] = ProductManage::OrderBy('id','desc')->where('status','1')->get();

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('AdminDashboard.Product.approve_product',$data);
    }

    public function ProductPanding(){
        $data['product'] = ProductManage::OrderBy('id','desc')->where('status','2')->get();

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('AdminDashboard.Product.panding_product',$data);
    }

    public function ProductDetailsAdd($id){
        $data['product'] = ProductManage::OrderBy('id','desc')->where('id',$id)->first();
        $data['product_details'] = ProductDetail::where('product_id',$id)->get();

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('AdminDashboard.Product.add_product_details',$data);
    }

    public function ProductDetailsPost(Request $request){

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

            return redirect()->back()->with($noti);
        }
    }

    public function DiscountProduct($id){
        $data['product'] = ProductManage::where('id',$id)->first();
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('AdminDashboard.Product.discount_page',$data);
    }

    public function DiscountProductStore(Request $Request){


        $update = ProductManage::where('id',$Request->productId)->first();
        $update->discount = $Request->discount;
        $update->new_price = $Request->new_price;
        $update->save();

        $noti = array(
            'message'=>'Your Product Discount successfully Added',
            'alert-type'=>'success'
        );

        return redirect()->route('OnlyDiscountProduct')->with($noti);
    }

    public function OnlyDiscountProduct(){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['product'] = ProductManage::whereNotNull('discount')->get();

        return view('AdminDashboard.Product.only_discount_product',$data);
    }

    public function ProductColorLinkupPage($id){
        $data['product_name'] = ProductManage::where('id',$id)->first()->product_name;
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['product_id'] = $id;
        $data['color'] = ProductManage::where('id',$id)->first('color_id');
        $json_for = \GuzzleHttp\json_decode(@$data['color']->color_id);
        $data['color'] = ColorManage::whereIn('id',@$json_for)->get();
        $data['color_image'] = ProductGallery::select('color_id','pro_id',DB::raw("count(color_id) as TotalImage"))->groupBy('color_id')->groupBy('pro_id')->where('pro_id',@$id)->get();
        return view('AdminDashboard.ColorImageLinkup.update',$data);
    }

    public function ProductColorLinkupUpdate(Request $request){

        $request->validate([
            'color_id'=>'required',
            'product_gallery'=>'required'
        ]);


        if($request->hasFile('product_gallery')){
            $matchColorImage = ProductGallery::where('color_id',$request->color_id)->where('pro_id',$request->pro_id)->get();
            foreach (@$matchColorImage as $key=>$colorImage){
                @unlink('upload/Client/ProductGallery/'.$colorImage->product_gallery);
                $colorImage->delete();
            }
            $random = rand(0000,9999);
            $size = 'size';
            $color_image = $request->product_gallery;
            foreach (@$color_image as $key=>$colorImages){
                @$fullname = time().'.'.$key.'.'.$random.'.'.$size.'.'.$colorImages->getClientOriginalExtension();
                Image::make($colorImages)->resize(515,515)->save('upload/Client/ProductGallery/'.@$fullname);
                $store = new ProductGallery();
                $store->pro_id = $request->pro_id;
                $store->color_id = $request->color_id;
                $store->product_gallery = $fullname;
                $store->save();
            }
        }

        $noti = array(
            'message'=>'Successfully Added',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);

    }

    public function ProductColorImageLinkupDelete($pro_id,$color_id){

        $matchColorImage = ProductGallery::where('color_id',$color_id)->where('pro_id',$pro_id)->get();

        foreach (@$matchColorImage as $key=>$colorImage){
            @unlink('upload/Client/ProductGallery/'.$colorImage->product_gallery);
            $colorImage->delete();
        }

        $noti = array(
            'message'=>'Successfully Delete',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($noti);
    }

}
