<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\handoverForm;
use Illuminate\Http\Request;
use App\Models\status;

class FormHandoverController extends Controller
{
    public function index()
    {
        $handoverForm = handoverForm::with(['users', 'status'])->get();

        return view('internal.content.form.formHandover.formHandoverDashboard', [
            'title' => 'Form Handover',
            'pageTitle' => 'Form Handover',
            'pageSubTitle' => 'Form Handover',
            'handoverForm' => $handoverForm

        ]);
    }

    public function detail($handover_form_id)
    {
        // $handoverForm = handoverForm::with(['users', 'status'])->where('handover_form_id', $handover_form_id)->first();
        $handoverForm = handoverForm::with(['users', 'status', 'handoverQuestions' => function($query) {
            $query->withPivot('answer');
        }])->findOrFail($handover_form_id);

        if (!$handoverForm) {
            // Handle the case where the adoption form is not found (e.g., redirect or show an error)
            return redirect()->back()->with('error', 'Adoption form not found.');
        }

        $userName = $handoverForm->users->name;

        return view('internal.content.form.formHandover.detail', [
            'title' => 'Detail Form Penyerahan',
            'pageTitle' => 'Detail Form Penyerahan',
            'pageSubTitle' => 'Formulir Penyerahan - ' . $userName,
            'detail' => $handoverForm,

            // 'adoptionQuestions' => $adoptionQuestions,
        ]);
    }

    public function edit($handover_form_id)
    {
        // $handoverForm = handoverForm::with(['users', 'status'])->where('handover_form_id', $handover_form_id)->first();
        $handoverForm = handoverForm::with(['users', 'status', 'handoverQuestions' => function($query) {
            $query->withPivot('answer');
        }])->findOrFail($handover_form_id);
        $status = status::where('config', 'Form_Handover_Status')->get();

        return view('internal.content.form.formHandover.edit', [
            'title' => 'Informasi Shelter',
            'pageTitle' => 'Konfigurasi Informasi Shelter',
            'pageSubTitle' => 'Daftar Informasi Shelter',
            'detail' => $handoverForm,
            'handoverFormStatus' => $status
        ]);
    }

    public function editPost(Request $request)
    {
        // dd($request->all());

        if ($request != null) {

            $update = handoverForm::where('handover_form_id', $request->handoverFormID)->update([

                'status_id' => $request->statusID,
                'admin_feedback' => $request->adminFeedback,
                'is_seen' => $request->isSeen,

            ]);
        }

        // dd($update);
        if ($update) {
            return back()->with('success', 'Form Penyerahan Berhasil di Update');
        }
    }
}
