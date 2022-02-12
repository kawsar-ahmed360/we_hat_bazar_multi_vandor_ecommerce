<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VandorApproveMail\approve_mail;
use App\Models\Admin;
use App\Models\Admin\Setting;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function VandorCategoryPermission($shop_id){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['vandor'] = Vandor::where('super_admin_status','1')->where('shop_id',$shop_id)->first();
        $data['category'] = Admin\CategoryManage::get();
        $data['permission_category'] = VandorCategoryPermission::where('shop_id',$shop_id)->first()->cat_id;
        $json_dec = json_decode($data['permission_category']);
        $data['permission_category'] =$json_dec;

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
}
