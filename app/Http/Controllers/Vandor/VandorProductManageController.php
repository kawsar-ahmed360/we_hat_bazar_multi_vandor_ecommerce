<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\CategoryManage;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;

class VandorProductManageController extends Controller
{
    public function VandorProductManage(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        $data['product'] = ProductManage::with('Category')->where('shop_id',$data['info']->shop_id)->get();

       return view('VandorDashboard.Product.all-product',$data);
    }

    public function VandorApproveProductList(){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        $data['product'] = ProductManage::with('Category')->where('shop_id',$data['info']->shop_id)->where('status','1')->get();

        return view('VandorDashboard.Product.all-approve-product',$data);

    }
    
    public function VandorPandingProductList(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category']= VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        $data['product'] = ProductManage::with('Category')->where('shop_id',$data['info']->shop_id)->where('status','2')->get();

        return view('VandorDashboard.Product.all-panding-product',$data);
    }
}
