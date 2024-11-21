<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use Illuminate\Http\Request;

class FormReportController extends Controller
{
    public function index(){

        $reportForm = reportForm::with(['users'])->get();

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
            'pageTitle' => 'Detail Laporan Penemuan Hewan Liar',   
            'pageSubTitle' => 'Detail Formulir ID: ' . $report_form_id,
            'detail' => $detail,
            'photo_animal' => $photo_animal,
            'photo_location' => $photo_location,
            'photo_additional' => $photo_additional,
        ]);
    }

    public function edit($report_form_id){

        $detail = reportForm::with('users')
            ->where('report_form_id', $report_form_id)
            ->first();

        $photos = explode(';', $detail->photo);
        $photo_animal = $photos[0] ?? null;
        $photo_location = $photos[1] ?? null; 
        $photo_additional = $photos[2] ?? null;
        // dd($detail);


        return view('internal.content.form.report.edit',[
            'title' => 'Edit Laporan Penemuan',
            'pageTitle' => 'Edit Laporan Penemuan Hewan Liar',
            'pageSubTitle' => 'Edit Formulir ID: '.$report_form_id,
            'detail' => $detail,
            'photo_animal' => $photo_animal,
            'photo_location' => $photo_location,
            'photo_additional' => $photo_additional,
        ]);
    }

    public function editPost(Request $request){

        try {
            // Update report
            $update = ReportForm::where('report_form_id', $request->report_form_id)
                ->update([
                    'status_id' => $request->statusLaporan,
                    'admin_response' => $request->responAdmin,
                    'updated_at' => now()
                ]);
    
            if (!$update) {
                return redirect()
                    ->back()
                    ->with('error', 'Gagal mengupdate status laporan');
            }
    
            return redirect()
                ->route('formReport.detail', $request->report_form_id)
                ->with('success', 'Status laporan berhasil diupdate');
    
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
