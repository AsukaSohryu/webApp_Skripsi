<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use App\Models\AdoptionForm;
use App\Models\status;
use Illuminate\Http\Request;

class StatusAdopsiController extends Controller
{
    public function index()
    {

        $userId = auth()->id();
        $adoption = AdoptionForm::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.pages.status.statusAdopsi.statusAdopsi', [
            'pagetitle' => 'Status Pengajuan Pengadopsian Hewan',
            'adoptions' => $adoption,
            'user' => $userId

        ]);
    }

    public function detail($adoption_form_id)
    {
        // $adoption = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal', 'adoptionQuestions' => function ($query) {
            $query->withPivot('answer');
        }])->findOrFail($adoption_form_id);

        // dd($adoptionForm->status);

        if (!$adoptionForm) {
            return redirect()->back()->with('error', 'Adoption form not found.');
        }

        $userName = $adoptionForm->users->name;


        // Get the status IDs for RJT, SUC, CAN
        $status = status::where('config', 'Form_Adoption_Status')->get();

        return view('frontend.pages.status.statusAdopsi.detailStatusAdopsi', [
            'pagetitle' => 'Status Pengajuan Pengadopsian Hewan',
            'adoptions' => $adoptionForm
        ]);
    }
}
