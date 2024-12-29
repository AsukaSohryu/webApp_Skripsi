<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\status;


class FormReportController extends Controller
{
    public function index()
    {

        $reportForm = reportForm::with(['users'])->get();

        return view('internal.content.form.formReport.formReportDashboard', [
            'title' => 'Formulir Report',
            'pageTitle' => 'Daftar Formulir Penemuan Hewan Liar',
            'pageSubTitle' => 'Daftar Formulir Penemuan Hewan Liar',
            'reportForm' => $reportForm
        ]);
    }

    public function detail($report_form_id)
    {
        $detail = reportForm::with('users')
            ->where('report_form_id', $report_form_id)
            ->first();

        $detail->is_seen = 1;
        $detail->save();

        // dd($detail);

        $status = status::where('config', 'Form_Report_Status')->get();
        $statusRSC = $status->where('key', 'RSC')->first()->status_id ?? null;
        $statusNFD = $status->where('key', 'NFD')->first()->status_id ?? null;
        $statusOTH = $status->where('key', 'OTH')->first()->status_id ?? null;
        $nonEditableStatuses = [$statusRSC, $statusNFD, $statusOTH];

        return view('internal.content.form.formReport.detail', [
            'title' => 'Detail Laporan Penemuan',
            'pageTitle' => 'Detail Laporan Penemuan Hewan Liar',
            'pageSubTitle' => 'Detail Formulir ID: ' . $report_form_id,
            'detail' => $detail,
            'nonEditableStatuses' => $nonEditableStatuses,
        ]);
    }

    public function toggleIsSeen($id){

        $notification = reportForm::findOrFail($id);
        $notification->is_seen = !$notification->is_seen;
        $notification->save();
        return back()->with('success', 'Notification status updated!');
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
        } // Penjagan buat gabisa nembak url langsung ke edit

        $status = status::where('config', 'Form_Report_Status')->get();
        $statusRSC = $status->where('key', 'RSC')->first()->status_id ?? null;
        $statusNFD = $status->where('key', 'NFD')->first()->status_id ?? null;
        $statusOTH = $status->where('key', 'OTH')->first()->status_id ?? null;
        $nonEditableStatuses = [$statusRSC, $statusNFD, $statusOTH];

        return view('internal.content.form.formReport.edit', [
            'title' => 'Edit Laporan Penemuan',
            'pageTitle' => 'Edit Laporan Penemuan Hewan Liar',
            'pageSubTitle' => 'Edit Formulir ID: ' . $report_form_id,
            'detail' => $detail,
            'reportFormStatus' => $status,
            'nonEditableStatuses' => $nonEditableStatuses
        ]);
    }

    public function editPost(Request $request)
    {

        if ($request->fotoResponAdmin == null) {
            $update = ReportForm::where('report_form_id', $request->report_form_id)
                ->update([
                    'status_id' => $request->statusLaporan,
                    'admin_feedback' => $request->responAdmin,
                    'updated_at' => now()
                ]);
        } else {
            $file_web = $request->file('fotoResponAdmin');
            $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

            $path_web = $file_web->storeAs('formReport', $file_web_name, 'public');

            $update = ReportForm::where('report_form_id', $request->report_form_id)
                ->update([
                    'status_id' => $request->statusLaporan,
                    'admin_feedback' => $request->responAdmin,
                    'admin_feedback_photo' => $file_web_name,
                    'updated_at' => now()
                ]);
        }
        // dd($update);
        if ($update) {
            return back()->with('success', 'Form Laporan Penemuan Hewan Berhasil di Update');
        }
    }
}
