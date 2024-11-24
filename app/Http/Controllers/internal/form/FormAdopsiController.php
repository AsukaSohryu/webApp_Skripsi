<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\adoptionForm;
use App\Models\animal;
use App\Models\status;
use App\Models\User;

class FormAdopsiController extends Controller
{

    public function index()
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal'])->get();

        return view('internal.content.form.formHandover.formHandoverDashboard', [
            'title' => 'Form Adopsi',
            'pageTitle' => 'Form Adopsi',
            'pageSubTitle' => 'Form Adopsi',
            'adoptionForm' => $adoptionForm
        ]);
    }

    public function detail($adoption_form_id)
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal'])->where('adoption_form_id', $adoption_form_id)->first();


        if (!$adoptionForm) {
            // Handle the case where the adoption form is not found (e.g., redirect or show an error)
            return redirect()->back()->with('error', 'Adoption form not found.');
        }

        $userName = $adoptionForm->users->name;

        // $adoptionQuestions = $adoptionForm->adoptionQuestions;

        return view('internal.content.form.formHandover.detail', [
            'title' => 'Detail Data Laporan',
            'pageTitle' => 'Detail Data Laporan',
            'pageSubTitle' => 'Adoption Form - ' . $userName,
            'detail' => $adoptionForm,

            // 'adoptionQuestions' => $adoptionQuestions,
        ]);
    }
}
