<?php

namespace App\Http\Controllers\internal\home;

use App\Http\Controllers\Controller;
use App\Models\adoptionForm;
use App\Models\handoverForm;
use App\Models\reportForm;
use App\Models\animal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $unreadReports = ReportForm::where('is_seen', 0)->get();
        $unreadAdoptions = AdoptionForm::where('is_seen', 0)->get();
        // $unreadHandovers = HandoverForm::where('is_seen', 0)->get();
        $unreadHandovers = HandoverForm::where('is_seen', 0)->with(['users', 'status', 'handoverQuestions' => function ($query) {
            $query->withPivot('answer');
        }])->get();


        return view('internal.content.dashboard', [
            'title' => 'Dasbor',
            'pageTitle' => 'Beranda',
            'pageSubTitle' => 'Dasbor',
            'unreadReports' => $unreadReports,
            'unreadAdoptions' => $unreadAdoptions,
            'unreadHandovers' => $unreadHandovers
        ]);
    }
}
