<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use App\Models\status;
use Illuminate\Http\Request;

class FormReportController extends Controller
{
    public function index(){

        $status = status::all();
        $reportForm = ReportForm::with(['user', 'status'])->get();

        return view('internal.content.form.report.formReportDashboard', [
            'title' => 'Form Report',
            'pageTitle' => 'Daftar Penemuan Hewan Liar',
            'pageSubTitle' => 'Daftar Penemuan Hewan Liar',
            'reportForm' => $reportForm
        ]);
    }

    public function detail($report_form_id){

        $detail = reportForm::where('report_form_id', $report_form_id)->first();
        // dd($detail);
        

        return view('internal.content.form.report.detail',[
            'title' => 'Detail Laporan Penemuan',
            'pageTitle' => 'Detail Data Laporan Penemuan Hewan Liar',   
            'pageSubTitle' => 'Detail Formulir ID: ' . $report_form_id,
            'detail' => '$detail',
        ]);
    }
}
