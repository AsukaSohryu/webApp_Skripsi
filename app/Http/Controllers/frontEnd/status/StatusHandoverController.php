<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use App\Models\HandoverForm;
use App\Models\status;
use Illuminate\Http\Request;

class StatusHandoverController extends Controller
{
    public function index(){
        $userId = auth()->id();
        $handover = HandoverForm::with('status')
            ->where('user_id', $userId)
            ->with(['handoverQuestions' => function($query) {
                $query->withPivot('answer');
            }])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.pages.status.statusHandover.statusHandover', [
            'pagetitle' => 'Status Pengajuan Penyerahan Hewan',
            'handovers' => $handover,
        ]);
    }

    public function detail($handover_form_id){
        $handoverForm = handoverForm::with(['users', 'status', 'handoverQuestions' => function ($query) {
            $query->withPivot('answer');
        }])->findOrFail($handover_form_id);

        // dd($adoptionForm->status);

        if (!$handoverForm) {
            return redirect()->back()->with('error', 'Adoption form not found.');
        }

        $userName = $handoverForm->users->name;

        $status = status::where('config', 'Form_Handover_Status')->get();

        return view('frontend.pages.status.statusHandover.detailStatusHandover', [
            'pagetitle' => 'Status Pengajuan Penyerahan Hewan',
            'handovers' => $handoverForm
        ]);
    }
}
