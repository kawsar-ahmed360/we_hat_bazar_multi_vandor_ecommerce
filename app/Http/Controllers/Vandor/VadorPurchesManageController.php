<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\ProductManage;
use App\Models\Admin\purshes;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class VadorPurchesManageController extends Controller
{
    public function Vandorpurshesadd(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        return view('VandorDashboard.Purches.purshes',$data);
    }

    public function VandorCatToProduct(Request $request){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $product = ProductManage::where('cat_id',$request->cat_id)->where('shop_id',$data['info']->shop_id)->get();

        return response()->json($product);
    }

    public function Vandorpurshesadd_store(Request $request){

//         dd($request->all());

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        if ($request->cat_id==null) {

            return redirect()->back()->with('wrong','please select cat_id');
        }else{

            if($request->date==[null]){
                return redirect()->back()->with('wrong','please select date');
            }else{

                if($request->purshes_no==[null]){
                    return redirect()->back()->with('wrong','please Create Purches Id');
                }else{



                    $category = count($request->cat_id);

                    for ($i=0; $i <$category ; $i++) {

                        $pur=new purshes();
                        $pur->date = $request->date[$i];
                        $pur->purshes_no = $request->purshes_no[$i];
                        $pur->supliar_id = $request->supliar_id[$i];
                        $pur->cat_id = $request->cat_id[$i];
                        $pur->product_id = $request->product_id[$i];
                        $pur->bying_qty = $request->bying_qty[$i];
                        $pur->bying_price = $request->bying_price[$i];
                        $pur->des = $request->des[$i];
                        $pur->subtotal = $request->subtotal[$i];
                        $pur->shop_id = $data['info']->shop_id;
                        $pur->shop_name = $data['info']->shop_name;
                        $pur->status = '0';


                        $pur->save();


                    }

                    return redirect()->route('Vandorpurshesadd_view')->with('success','data successfully inserted');
                }
            }
        }


    }

    public function Vandorpurshesadd_view(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['all'] = purshes::OrderBy('date','desc')->where('shop_id',$data['info']->shop_id)->get();

        return view('VandorDashboard.Purches.view',$data);
    }

    public function Vandorpurshesadd_delete($id,$shop_id){

        $pro = purshes::where('id',$id)->where('shop_id',$shop_id)->delete();
        return redirect()->route('Vandorpurshesadd_view')->with('success','data successfully inserted');
    }

    public function Vandorpanding_purshes(){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['all'] = purshes::OrderBy('date','desc')->where('status','0')->where('shop_id',$data['info']->shop_id)->get();

        return view('VandorDashboard.Purches.panding',$data);
    }

    public function Vandorapprove_purshes($id,$shop_id){

        $purs = purshes::where('id',$id)->where('shop_id',$shop_id)->first();

        $product = ProductManage::where('id',$purs->product_id)->where('shop_id',$shop_id)->first();



//        $product = products::find($Request->id);
//
//        $new_qty = $Request->product_qty;
//
//        $product_qty =$product->product_qty;
//
//        $Calculator = $new_qty-$product_qty;
//
//        //.............Old Product Qty Section-----------------
//
//        $old_total_qty = $product->total_qty;
//
//        $old_qty_increment = $old_total_qty+$Calculator;

        $product_qty = ((float)($purs->bying_qty))+((float)($product->product_qty));
        $product->product_qty=$product_qty;

        $Newproduct_qty = ((float)($purs->bying_qty))+((float)($product->total_qty));
        $product->total_qty=$Newproduct_qty;

        if ($product->save()) {

            $purs->status = '1';

            $purs->save();
        }

        return redirect()->route('Vandorpurshesadd_view')->with('success','data successfully inserted');

    }

    public function Vandorpurshesadd_dailyreport(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        return view('VandorDashboard.Purches.daily_report',$data);
    }

    public function Vandorpurshesadd_dailyreport_genarate(Request $request){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['all'] = purshes::whereBetween('date',[$request->fdate,$request->ldate])->where('shop_id',$data['info']->shop_id)->where('status','1')->get();


        $pdf = Pdf::loadView('VandorDashboard.Purches.purshes_daily_pdf',$data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }


}
