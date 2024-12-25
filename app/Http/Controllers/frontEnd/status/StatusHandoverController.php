<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use App\Models\HandoverForm;
use Illuminate\Http\Request;

class StatusHandoverController extends Controller
{
    public function index(){
        $userId = auth()->id();
        $handover = HandoverForm::where('user_id', $userId)
            ->with(['handoverQuestions' => function($query) {
                $query->withPivot('answer');
            }])
            ->get();
            
        return view('frontend.pages.status.statusHandover.statusHandover', [
            'pagetitle' => 'Status Pengajuan Penyerahan Hewan',
            'handovers' => $handover,
        ]);
    }
}
