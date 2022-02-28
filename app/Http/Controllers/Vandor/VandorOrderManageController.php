<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Mail\VandorOrderStatus\OrderApproveMail;
use App\Mail\VandorOrderStatus\OrderCompleteStatusApporve;
use App\Mail\VandorOrderStatus\OrderCompleteStatusPanding;
use App\Mail\VandorOrderStatus\OrderPandingMail;
use App\Mail\VandorOrderStatus\OrderShippingApprove;
use App\Mail\VandorOrderStatus\OrderShippingPanding;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\ProductManage;
use App\Models\Client\CustomerRegistration;
use App\Models\Client\Order;
use App\Models\Client\OrderDetail;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VandorOrderManageController extends Controller
{
    public function VandorOrderManage(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }


        $shop_i = Vandor::where('id',$id)->first();
        $data['shop_i'] = Vandor::where('id',$id)->first();

        $data['order']=Order::OrderBy('id','desc')->where('shop_id', 'LIKE', "%$shop_i->shop_id%")->get();


        return view('VandorDashboard.Order.all-order',$data);
    }

    public function VandorOrderManageAjax(){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_i = Vandor::where('id',$id)->first();
        $data['shop_i'] = Vandor::where('id',$id)->first();

        $data['order']=Order::OrderBy('id','desc')->where('shop_id', 'LIKE', "%$shop_i->shop_id%")->get();

        return view('VandorDashboard.Order.OrderListAjax.order',$data);
    }

    public function VandorOrderDetails($id,$shop_id){

        $order_id = $id;

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_i = Vandor::where('id',$id)->first();
        $shops_id = Vandor::where('id',$id)->first()->shop_id;

      $data['order'] = Order::with('customer','payments')->where('id',$order_id)->where('shop_id', 'LIKE', "%$shops_id%")->first();
      $data['order_details'] = OrderDetail::where('order_id',$data['order']->id)->where('shop_id',$shops_id)->get();

       return view('VandorDashboard.Order.order_details',$data);


    }

    public function VandorOrderStatusPage($id,$shop_id){
        $order_id = $id;
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_i = Vandor::where('id',$id)->first();
        $shops_id = Vandor::where('id',$id)->first()->shop_id;

        $data['order'] = Order::with('customer','payments')->where('id',$order_id)->where('shop_id', 'LIKE', "%$shops_id%")->first();
        $data['order_details'] = OrderDetail::with('products')->where('order_id',$data['order']->id)->where('shop_id',$shops_id)->get();

        return view('VandorDashboard.Order.order_status',$data);
    }

    //--------------------Order Status Section---------------

    public function VandorOrderStatusApprove($id,$shop_id){

         $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
         $approve->order_status = 2;
         $approve->save();

        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();
        $vandor = Vandor::where('shop_id',$shop_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();



        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $vandor->shop_id,
            'ShopName'   =>   $vandor->shop_name,
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderApproveMail($data));

         return redirect()->back();
    }

    public function VandorOrderStatusPanding($id,$shop_id){


        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->order_status = 1;
        $approve->save();


        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();
        $vandor = Vandor::where('shop_id',$shop_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();



        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $vandor->shop_id,
            'ShopName'   =>   $vandor->shop_name,
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderPandingMail($data));



        return redirect()->back();
    }

    //-----------------Shipping Status-------------

    public function VandorShippingStatusApprove($id,$shop_id){
        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->shipping_status = 2;
        $approve->save();

        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();
        $vandor = Vandor::where('shop_id',$shop_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();


        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $vandor->shop_id,
            'ShopName'   =>   $vandor->shop_name,
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderShippingApprove($data));

        return redirect()->back();
    }

    public function VandorShippingStatusPanding($id,$shop_id){

        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->shipping_status = 1;
        $approve->save();

        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();
        $vandor = Vandor::where('shop_id',$shop_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();


        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $vandor->shop_id,
            'ShopName'   =>   $vandor->shop_name,
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderShippingPanding($data));

        return redirect()->back();
    }

    public function VandorCompleteStatusApporve($id,$shop_id){

        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->order_complete = 2;
        $approve->save();

        $product = ProductManage::where('id',$approve->product_id)->first();
        $qty_update = $product->product_qty-$approve->qty;
        $product->product_qty = $qty_update;
        $product->save();




        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();
        $vandor = Vandor::where('shop_id',$shop_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();


        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $vandor->shop_id,
            'ShopName'   =>   $vandor->shop_name,
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderCompleteStatusApporve($data));

        return redirect()->back();
    }

    public function VandorCompleteStatusPanding($id,$shop_id){

        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->order_complete = 1;
        $approve->save();

        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();
        $vandor = Vandor::where('shop_id',$shop_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();


        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $vandor->shop_id,
            'ShopName'   =>   $vandor->shop_name,
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderCompleteStatusPanding($data));

        return redirect()->back();

    }

    public function VandorMultiOrderPrient(Request $request){

        $data['Order'] = Order::whereIn('id',$request->prints)->where('shop_id', 'LIKE', "%$request->shop_id%")->get();
        return view('VandorDashboard.MultiPrint.pri',$data);


//        return view('');
    }

    public function VandorMailTemplate(){

        return view('VandorDashboard.Order_Status_Mail.order_approve');
    }

    //--------------------Order Status Check----------------
    public function VandorMouseOverPreview(Request $request){

        $order_id = $request->Order_Id;
        $ShopId = $request->Shop_Id;
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_i = Vandor::where('id',$id)->first();
        $shops_id = Vandor::where('id',$id)->first()->shop_id;

        $data['order'] = Order::with('customer','payments')->where('id',$order_id)->where('shop_id', 'LIKE', "%$shops_id%")->first();
        $data['order_details'] = OrderDetail::with('products')->where('order_id',$data['order']->id)->where('shop_id',$shops_id)->get();

        return response()->json(['order'=>$data['order'],'order_details'=>$data['order_details']]);


    }
}
