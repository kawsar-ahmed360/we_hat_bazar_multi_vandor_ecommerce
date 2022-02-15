<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryManage;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VandorCategoryManageController extends Controller
{
    public function VandorCategoryManage(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }


        return view('VandorDashboard.Category.all-category',$data);
    }
}
