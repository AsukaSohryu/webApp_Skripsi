<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use App\Models\status;
use App\Models\User;
use Illuminate\Http\Request;

class FormReportController extends Controller
{
    public function index(){

        // $reportForm = reportForm::all();
        // $status = status::all();
        $reportForm = ReportForm::with(['user', 'status'])->get();
        // dd($status);

        return view('internal.content.report.formReportDashboard', [
            'title' => 'Form Report',
            'pageTitle' => 'Form Report',
            'pageSubTitle' => 'Form Report',
            'reportForm' => $reportForm
        ]);
    }

    public function detail($report_id){

        $detail = reportForm::where('report_id', $report_id)->first();
        // dd($detail);
        $name = $detail->report_name;

        return view('internal.content.report.detail',[
            'title' => 'Detail Data Laporan',
            'pageTitle' => 'Detail Data Laporan',
            'pageSubTitle' => $name,
            'detail' => $detail,
        ]);
    }
}
