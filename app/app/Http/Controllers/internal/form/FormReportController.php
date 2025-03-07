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
            'pageTitle' => 'Daftar Laporan Penemuan Hewan Peliharaan Liar',
            'pageSubTitle' => 'Daftar Laporan Penemuan Hewan Peliharaan Liar',
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
        $userName = $detail->users->name;

        $status = status::where('config', 'Form_Report_Status')->get();
        $statusRSC = $status->where('key', 'RSC')->first()->status_id ?? null;
        $statusNFD = $status->where('key', 'NFD')->first()->status_id ?? null;
        $statusOTH = $status->where('key', 'OTH')->first()->status_id ?? null;
        $nonEditableStatuses = [$statusRSC, $statusNFD, $statusOTH];

        return view('internal.content.form.formReport.detail', [
            'title' => 'Detail Laporan Penemuan Hewan Peliharaan Liar',
            'pageTitle' => 'Detail Laporan Penemuan Hewan Peliharaan Liar',
            'pageSubTitle' => 'Detail Laporan Penemuan Hewan Peliharaan Liar - ' . $userName,
            'detail' => $detail,
            'nonEditableStatuses' => $nonEditableStatuses,
        ]);
    }

    public function toggleIsSeen($id)
    {

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
                ->with('error', 'Status laporan sudah selesai, tidak bisa diperbaharui');
        } // Penjagan buat gabisa nembak url langsung ke edit

        $userName = $detail->users->name;

        $status = status::where('config', 'Form_Report_Status')->get();
        $statusRSC = $status->where('key', 'RSC')->first()->status_id ?? null;
        $statusNFD = $status->where('key', 'NFD')->first()->status_id ?? null;
        $statusOTH = $status->where('key', 'OTH')->first()->status_id ?? null;
        $nonEditableStatuses = [$statusRSC, $statusNFD, $statusOTH];

        return view('internal.content.form.formReport.edit', [
            'title' => 'Ubah Laporan Penemuan Hewan Peliharaan Liar',
            'pageTitle' => 'Ubah Laporan Penemuan Hewan Peliharaan Liar',
            'pageSubTitle' => 'Ubah Laporan Penemuan Hewan Peliharaan Liar - ' . $userName,
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
            // $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();
            $file_web_name = $file_web->getClientOriginalName();

            $path_web = $file_web->move('uploadedImages/laporanPenemuan/responAdmin', $file_web_name);

            $update = ReportForm::where('report_form_id', $request->report_form_id)
                ->update([
                    'status_id' => $request->statusLaporan,
                    'admin_feedback' => $request->responAdmin,
                    'admin_feedback_photo' => $file_web_name,
                    'updated_at' => now()
                ]);
        }
        // dd($update);
        if ($update == 1) {
            // dd('tes');
            return redirect()->route('formReport.detail', $request->report_form_id)->with('success', 'Formulir Laporan Penemuan Hewan Peliharaan Liar Berhasil Diperbaharui');
        }
    }
}
