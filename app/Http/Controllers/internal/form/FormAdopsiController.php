<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\adoptionForm;
use Illuminate\Http\Request;
use App\Models\status;
use GuzzleHttp\Psr7\Query;

class FormAdopsiController extends Controller
{

    public function index()
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal'])->get();
        return view('internal.content.form.formAdopsi.formAdopsiDashboard', [
            'title' => 'Formulir Adopsi',
            'pageTitle' => 'Daftar Formulir Adopsi',
            'pageSubTitle' => 'Daftar Formulir Adopsi',
            'adoptionForm' => $adoptionForm
        ]);
    }

    public function detail($adoption_form_id)
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal', 'adoptionQuestions' => function ($query) {
            $query->withPivot('answer');
        }])->findOrFail($adoption_form_id);

        // dd($adoptionForm->adoptionQuestions);

        if (!$adoptionForm) {
            // Handle the case where the adoption form is not found (e.g., redirect or show an error)
            return redirect()->back()->with('error', 'Adoption form not found.');
        }

        $userName = $adoptionForm->users->name;

        $adoptionForm->is_seen = 1;
        $adoptionForm->save();

        return view('internal.content.form.formAdopsi.detail', [
            'title' => 'Detail Formulir Adopsi',
            'pageTitle' => 'Detail Formulir Adopsi',
            'pageSubTitle' => 'Detail Formulir Adopsi - ' . $userName,
            'detail' => $adoptionForm,
        ]);
    }

    public function edit($adoption_form_id)
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal', 'adoptionQuestions' => function ($query) {
            $query->withPivot('answer');
        }])->findOrFail($adoption_form_id);
        $status = status::where('config', 'Form_Adoption_Status')->get();
        $userName = $adoptionForm->users->name;

        return view('internal.content.form.formAdopsi.edit', [
            'title' => 'Perubahan Formulir Adopsi',
            'pageTitle' => 'Perubahan Formulir Adopsi',
            'pageSubTitle' => 'Perubahan Formulir Adopsi - ' . $userName,
            'detail' => $adoptionForm,
            'adoptionFormStatus' => $status,
            'adoptionForm' => $adoptionForm,
        ]);
    }

    public function editPost(Request $request)
    {
        // dd($request->all());
        if ($request != null) {

            $update = adoptionForm::where('adoption_form_id', $request->adoptionFormID)->update([

                // 'shelter_name' => $request->namaShelter,
                'status_id' => $request->statusID,
                'admin_feedback' => $request->adminFeedback,
            ]);
        }

        // dd($update);
        if ($update) {
            return back()->with('success', 'Form Adopsi Berhasil di Update');
        }
    }
}
