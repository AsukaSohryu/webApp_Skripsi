<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use Illuminate\Http\Request;

class StatusReportController extends Controller
{
    public function index(){
        
        $userId = auth()->id();
        $report = reportForm::where('user_id', $userId)->get();

        return view('frontend.pages.status.statusReport', [
            'pagetitle' => 'Status Laporan Penemuan Hewan Hilang',
            'report' => $report,
            'user' => $userId
        ]);
    }
}
