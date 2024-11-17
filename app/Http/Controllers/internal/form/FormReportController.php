<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use App\Models\status;
use Illuminate\Http\Request;

class FormReportController extends Controller
{
    public function index(){

        $reportForm = ReportForm::with(['users'])->get();

        return view('internal.content.form.report.formReportDashboard', [
            'title' => 'Form Report',
            'pageTitle' => 'Daftar Penemuan Hewan Liar',
            'pageSubTitle' => 'Daftar Penemuan Hewan Liar',
            'reportForm' => $reportForm
        ]);
    }

    public function detail($report_form_id){

        $detail = reportForm::with('users')
            ->where('report_form_id', $report_form_id)
            ->first();

        $photos = explode(';', $detail->photo);
        $photo_animal = $photos[0] ?? null;
        $photo_location = $photos[1] ?? null; 
        $photo_additional = $photos[2] ?? null;
        // dd($detail);

        return view('internal.content.form.report.detail',[
            'title' => 'Detail Laporan Penemuan',
            'pageTitle' => 'Detail Data Laporan Penemuan Hewan Liar',   
            'pageSubTitle' => 'Detail Formulir ID: ' . $report_form_id,
            'detail' => $detail,
            'photo_animal' => $photo_animal,
            'photo_location' => $photo_location,
            'photo_additional' => $photo_additional,
        ]);
    }
}
