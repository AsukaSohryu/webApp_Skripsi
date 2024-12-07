<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormReportController extends Controller
{
    public function index()
    {

        $reportForm = reportForm::with(['users'])->get();

        return view('internal.content.form.formReport.formReportDashboard', [
            'title' => 'Formulir Report',
            'pageTitle' => 'Daftar Penemuan Hewan Liar',
            'pageSubTitle' => 'Daftar Penemuan Hewan Liar',
            'reportForm' => $reportForm
        ]);
    }

    public function detail($report_form_id)
    {

        $detail = reportForm::with('users')
            ->where('report_form_id', $report_form_id)
            ->first();

        $photos = explode(';', $detail->photo);
        $photo_animal = $photos[0] ?? null;
        $photo_location = $photos[1] ?? null;
        $photo_additional = $photos[2] ?? null;

        $detail->is_seen = 1;
        $detail->save();

        // dd($detail);

        return view('internal.content.form.formReport.detail', [
            'title' => 'Detail Laporan Penemuan',
            'pageTitle' => 'Detail Laporan Penemuan Hewan Liar',
            'pageSubTitle' => 'Detail Formulir ID: ' . $report_form_id,
            'detail' => $detail,
            'photo_animal' => $photo_animal,
            'photo_location' => $photo_location,
            'photo_additional' => $photo_additional,
        ]);
    }

    public function edit($report_form_id)
    {


        $detail = reportForm::with(['users', 'status'])
            ->where('report_form_id', $report_form_id)
            ->first();

        if (in_array($detail->status_id, [3, 4, 5])) {
            return redirect()
                ->route('formReport.detail', $report_form_id)
                ->with('error', 'Status laporan sudah selesai, tidak bisa diupdate');
        }

        $photos = explode(';', $detail->photo);
        $photo_animal = $photos[0] ?? null;
        $photo_location = $photos[1] ?? null;
        $photo_additional = $photos[2] ?? null;
        // dd($detail);


        return view('internal.content.form.formReport.edit', [
            'title' => 'Edit Laporan Penemuan',
            'pageTitle' => 'Edit Laporan Penemuan Hewan Liar',
            'pageSubTitle' => 'Edit Formulir ID: ' . $report_form_id,
            'detail' => $detail,
            'photo_animal' => $photo_animal,
            'photo_location' => $photo_location,
            'photo_additional' => $photo_additional,
        ]);
    }

    public function editPost(Request $request)
    {
        if($request != null){
            $update = ReportForm::where('report_form_id', $request->report_form_id)
                    ->update([
                        'status_id' => $request->statusLaporan,
                        'admin_feedback' => $request->responAdmin,
                        'updated_at' => now()
                    ]);
            
        }
        // dd($update);
        if ($update) {
            return back()->with('success', 'Form Adopsi Berhasil di Update');
        }
        
    }
}
