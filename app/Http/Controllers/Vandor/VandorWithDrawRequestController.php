<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Client\Order;
use App\Models\Vandor;
use App\Models\VandorPaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VandorWithDrawRequestController extends Controller
{
    public function VandorWithdraRequest(){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        $data['request_amount'] = VandorPaymentRequest::where('status','2')->where('shop_id',@$data['info']->shop_id)->where('user_id',@$id)->sum('approve_amount');
        $data['panding_request'] = VandorPaymentRequest::where('status','1')->where('shop_id',$data['info']->shop_id)->where('user_id',$id)->OrderBy('id','desc')->get()->take(10);
        $data['panding_request_count'] = VandorPaymentRequest::where('status','1')->where('shop_id',$data['info']->shop_id)->where('user_id',$id)->OrderBy('id','desc')->get()->count();
        $data['approve_request'] = VandorPaymentRequest::where('status','2')->where('shop_id',$data['info']->shop_id)->where('user_id',$id)->OrderBy('id','desc')->get()->take(10);
        $shopId = $data['info']->shop_id;
        $data['order'] = Order::where('shop_id', 'LIKE', "%$shopId%")->get();

        foreach ($data['order'] as $key => $or){

            $data['total_income'] = \App\Models\Client\OrderDetail::where('shop_id',$shopId)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('subtotal');
            $data['comission_price'] = \App\Models\Client\OrderDetail::where('shop_id',$shopId)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('comm_price');
            $data['with_out_comission'] = $data['total_income']-$data['comission_price'];
        }

        return view('VandorDashboard.withdrow.send_request',$data);
    }

    public function VandorWithdraPandingRequestAjaxFilter(Request $request){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['panding_request'] = VandorPaymentRequest::where('status','1')->where('shop_id',$data['info']->shop_id)->where('user_id',$id)->where("request_amoung","LIKE","%".$request->valu."%")->orWhere("created_at","LIKE","%".$request->valu."%")->OrderBy('id','desc')->get();

        return view('VandorDashboard.withdrow.filter.panding_filter',$data);
    }


    public function VandorWithdraApproveRequestFilterAjax(Request $request){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['approve_request'] = VandorPaymentRequest::where('status','2')->where('shop_id',$data['info']->shop_id)->where('user_id',$id)->where("request_amoung","LIKE","%".$request->valu."%")->orWhere("created_at","LIKE","%".$request->valu."%")->OrderBy('id','desc')->get();

        return view('VandorDashboard.withdrow.filter.apporve_filter',$data);
    }

//apporve_filter.blade

    public function VandorWithdraPandingRequest(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        $data['panding_request'] = VandorPaymentRequest::where('status','1')->where('shop_id',$data['info']->shop_id)->where('user_id',$id)->OrderBy('id','desc')->get();

        return view('VandorDashboard.withdrow.pandig_request',$data);

    }

    public function VandorWithdraApproveRequest(){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        $data['panding_request'] = VandorPaymentRequest::where('status','2')->where('shop_id',$data['info']->shop_id)->where('user_id',$id)->OrderBy('id','desc')->get();

        return view('VandorDashboard.withdrow.approve_request',$data);
    }

    public function VandorWithdraRequestStore(Request $request){

        $request->validate([
            'shop_id'=>'required'
        ]);

        $store = new VandorPaymentRequest();
        $store->user_id = $request->userId;
        $store->shop_id = $request->shop_id;
        $store->request_amoung = $request->request_amoung;
        $store->payment = $request->payment;
        $store->bkash_number = $request->bkash_number;
        $store->nagad_number = $request->nagad_number;
        $store->rocket_number = $request->rocket_number;
        $store->bank_account_number = $request->bank_account_number;
        $store->status = 1;
        $store->save();

        $noti = array(
            'message'=>'successfully Request Send',
            'alert-type'=>'success'
        );

        return redirect()->route('VandorWithdraPandingRequest')->with($noti);


    }
}
