<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\adoptionForm;
use Illuminate\Http\Request;
use App\Models\status;

class FormAdopsiController extends Controller
{

    public function index()
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal'])->get();

        return view('internal.content.form.formAdopsi.formAdopsiDashboard', [
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

        return view('internal.content.form.formAdopsi.detail', [
            'title' => 'Detail Data Laporan',
            'pageTitle' => 'Detail Data Laporan',
            'pageSubTitle' => 'Adoption Form - ' . $userName,
            'detail' => $adoptionForm,

            // 'adoptionQuestions' => $adoptionQuestions,
        ]);
    }

    public function edit($adoption_form_id)
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal'])->where('adoption_form_id', $adoption_form_id)->first();
        $status = status::where('config', 'Form_Adoption_Status')->get();

        return view('internal.content.form.formAdopsi.edit', [
            'title' => 'Informasi Shelter',
            'pageTitle' => 'Konfigurasi Informasi Shelter',
            'pageSubTitle' => 'Daftar Informasi Shelter',
            'detail' => $adoptionForm,
            'adoptionFormStatus' => $status
        ]);
    }

    public function editPost(Request $request)
    {
        dd($request->all());
        // if ($request->fotoHewan == null) {
        if ($request != null) {

            $update = adoptionForm::where('adoption_form_id', $request->adoptionID)->update([

                // 'shelter_name' => $request->namaShelter,
                'status_id' => $request->statusID,
                'admin_feedback' => $request->adminFeedback,
                'is_seen' => $request->isSeen,

            ]);
        }

        // dd($update);
        if ($update) {
            return back()->with('success', 'Form Adopsi Berhasil di Update');
        }
    }
}
