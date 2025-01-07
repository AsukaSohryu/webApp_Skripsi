<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use App\Models\status;
use Illuminate\Http\Request;

class StatusReportController extends Controller
{
    public function index(){
        
        $userId = auth()->id();
        $report = reportForm::with('status')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.pages.status.statusReport.statusReport', [
            'pagetitle' => 'Status Laporan Penemuan Hewan Hilang',
            'reports' => $report,
            'user' => $userId
        ]);
    }

    public function detail($report_form_id){
        $reportForm = ReportForm::with(['users', 'status'])
            ->findOrFail($report_form_id);

        if (!$reportForm) {
            return redirect()->back()->with('error', 'Report form not found.');
        }

        $userName = $reportForm->users->name;

        $status = Status::where('config', 'Form_Report_Status')->get();

        return view('frontend.pages.status.statusReport.detailStatusReport', [
            'pagetitle' => 'Status Laporan Penemuan Hewan Hilang',
            'reports' => $reportForm
        ]);
    }
}
