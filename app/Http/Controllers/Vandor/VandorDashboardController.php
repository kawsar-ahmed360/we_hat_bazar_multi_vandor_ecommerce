<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Client\Order;
use App\Models\Client\OrderDetail;
use App\Models\Vandor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class VandorDashboardController extends Controller
{
    public function VandorDashobard(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();



        $currentDateTime = Carbon::now();
        $data['this_month'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$currentDateTime)
            ->sum('subtotal');

        //........One Month Ago.....
        $one_month_ago = Carbon::now()->subMonths(1);
        $data['one_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$one_month_ago)
            ->sum('subtotal');

        $two_month_ago = Carbon::now()->subMonths(2);
        $data['two_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$two_month_ago)
            ->sum('subtotal');


        $three_month_ago = Carbon::now()->subMonths(3);
        $data['three_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$three_month_ago)
            ->sum('subtotal');

        $four_month_ago  = Carbon::now()->subMonths(4);
        $data['four_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$four_month_ago)
            ->sum('subtotal');


        $five_month_ago  = Carbon::now()->subMonths(5);
        $data['five_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$five_month_ago)
            ->sum('subtotal');


        $six_month_ago  = Carbon::now()->subMonths(6);
        $data['six_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$six_month_ago)
            ->sum('subtotal');


        $seven_month_ago  = Carbon::now()->subMonths(7);
        $data['seven_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$seven_month_ago)
            ->sum('subtotal');

        $eight_month_ago  = Carbon::now()->subMonths(8);
        $data['eight_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eight_month_ago)
            ->sum('subtotal');


        $nine_month_ago  = Carbon::now()->subMonths(9);
        $data['nine_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$nine_month_ago)
            ->sum('subtotal');

        $ten_month_ago  = Carbon::now()->subMonths(10);
        $data['ten_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$ten_month_ago)
            ->sum('subtotal');

        $eleven_month_ago  = Carbon::now()->subMonths(11);
        $data['eleven_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eleven_month_ago)
            ->sum('subtotal');


        //------------------------ Vandor Amount ---------------------

        $shopId = $data['info']->shop_id;

        $data['order'] = Order::where('shop_id', 'LIKE', "%$shopId%")->get();

        foreach ($data['order'] as $key => $or){

            $data['total_income'] = \App\Models\Client\OrderDetail::where('shop_id',$shopId)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('subtotal');
            $data['comission_price'] = \App\Models\Client\OrderDetail::where('shop_id',$shopId)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('comm_price');
            $data['with_out_comission'] = $data['total_income']-$data['comission_price'];
        }





        return view('VandorDashboard.main',$data);
    }

    //------------------Profile Info Update----------------

    public function VandorProfile($id){

        $data['info'] = Vandor::where('id',$id)->first();
       return view('VandorDashboard.profile.profile',$data);
    }

    public function VandorProfileUpdate(Request $request){

        $update = Vandor::where('id',$request->EditeId)->first();
        $update->f_name = $request->f_name;
        $update->phone = $request->phone;
        $update->street_address = $request->street_address;
        $update->city = $request->city;
        $update->state = $request->state;
        $update->zip = $request->zip;
        $update->save();

        if($request->hasFile('profile')){
            $image_profile = $request->file('profile');
            $fullname_profile = time().'.'.$image_profile->getClientOriginalExtension();
            @unlink('upload/Vandor/profile/'.$update->profile);
            Image::make($image_profile)->resize(100,100)->save('upload/Vandor/profile/'.$fullname_profile);
            $update->profile = $fullname_profile;
            $update->save();
        }

        if($request->hasFile('shop_image')){
            $image_shop_image = $request->file('shop_image');
            $fullname_shop_image = time().'.'.$image_shop_image->getClientOriginalExtension();
            @unlink('upload/Vandor/shop_image/'.$update->shop_image);
            Image::make($image_shop_image)->resize(160,29)->save('upload/Vandor/shop_image/'.$fullname_shop_image);
            $update->shop_image = $fullname_shop_image;
            $update->save();
        }

        if($request->hasFile('shop_banner')){
            $image_shop_banner = $request->file('shop_banner');
            $fullname_shop_banner = time().'.'.$image_shop_banner->getClientOriginalExtension();
            @unlink('upload/Vandor/shop_banner/'.$update->shop_banner);
            Image::make($image_shop_banner)->resize(1200,500)->save('upload/Vandor/shop_banner/'.$fullname_shop_banner);
            $update->shop_banner = $fullname_shop_banner;
            $update->save();
        }

        return redirect()->back();

    }
}
