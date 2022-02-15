<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\ProductManage;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use App\View\Components\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VadorStokeGenarateController extends Controller
{
    public function VandorStockGenaratorPage(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }


        return view('VandorDashboard.Stock_report.report_genarator_page',$data);
    }

    public function VandorCategoryWiseStock(Request $request){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['product'] = ProductManage::where('cat_id',$request->cate_wise_report)->where('shop_id',$data['info']->shop_id)->get();

        return view('VandorDashboard.Stock_report.stock_report',$data);
    }

    public function VandorStockGenaratorProductAjax(Request $request){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $product = ProductManage::where('cat_id',$request->cat_id)->where('shop_id',$data['info']->shop_id)->get();
        return response()->json($product);
    }

    public function VandorProductWiseStockGenare(Request $request){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['product'] = ProductManage::where('cat_id',$request->cate_wise_report)->where('id',$request->product_name)->where('shop_id',$data['info']->shop_id)->get();

        return view('VandorDashboard.Stock_report.product_stock_report',$data);

    }
}
