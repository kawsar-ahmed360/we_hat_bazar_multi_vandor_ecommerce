<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Client\Order;
use App\Models\Vandor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class VadorReportGenarateController extends Controller
{
    public function VandorReport_Genarator(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        return view('VandorDashboard.Report.report_genarate',$data);
    }

    public function VandorFinal_Report_Genarator(Request $request){
        $data['s_date'] = $request->s_date;
        $data['e_date'] = $request->e_date;
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_id = Vandor::where('id',$id)->first()->shop_id;
        $data['shop_i'] = Vandor::where('id',$id)->first();
        $data['Report'] = Order::whereBetween('created_at',[$request->s_date,$request->e_date])->where('shop_id', 'LIKE', "%$shop_id%")->get();

        return view('VandorDashboard.Report.final_report',$data);

    }

    public function VandorPdfFinal_Report_Genarator(Request $request){

        $data['s_date'] = $request->s_date;
        $data['e_date'] = $request->e_date;
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_id = Vandor::where('id',$id)->first()->shop_id;
        $data['shop_i'] = Vandor::where('id',$id)->first();
        $data['Report'] = Order::whereBetween('created_at',[$request->s_date,$request->e_date])->where('shop_id', 'LIKE', "%$shop_id%")->get();
        $pdf = PDF::loadView('VandorDashboard/Report/pdf/report_genarte_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
