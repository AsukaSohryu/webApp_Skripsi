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
            return redirect()->back()->with('error', 'Adoption form not found.');
        }

        $userName = $adoptionForm->users->name;

        $adoptionForm->is_seen = 1;
        $adoptionForm->save();

        // Get the status IDs for RJT, SUC, CAN
        $status = status::where('config', 'Form_Adoption_Status')->get();
        $statusRJT = $status->where('key', 'RJT')->first()->status_id ?? null;
        $statusSUC = $status->where('key', 'SUC')->first()->status_id ?? null;
        $statusCAN = $status->where('key', 'CAN')->first()->status_id ?? null;
        $statusOTH = $status->where('key', 'OTH')->first()->status_id ?? null;
        $nonEditableStatuses = [$statusRJT, $statusSUC, $statusCAN, $statusOTH];

        return view('internal.content.form.formAdopsi.detail', [
            'title' => 'Detail Formulir Adopsi',
            'pageTitle' => 'Detail Formulir Adopsi',
            'pageSubTitle' => 'Detail Formulir Adopsi - ' . $userName,
            'detail' => $adoptionForm,
            'nonEditableStatuses' => $nonEditableStatuses,
        ]);
    }

    public function edit($adoption_form_id)
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal', 'adoptionQuestions' => function ($query) {
            $query->withPivot('answer');
        }])->findOrFail($adoption_form_id);

        $userName = $adoptionForm->users->name;

        // Get the status IDs for RJT, SUC, CAN
        $status = status::where('config', 'Form_Adoption_Status')->get();
        $statusRJT = $status->where('key', 'RJT')->first()->status_id ?? null;
        $statusSUC = $status->where('key', 'SUC')->first()->status_id ?? null;
        $statusCAN = $status->where('key', 'CAN')->first()->status_id ?? null;
        $statusOTH = $status->where('key', 'OTH')->first()->status_id ?? null;
        $nonEditableStatuses = [$statusRJT, $statusSUC, $statusCAN, $statusOTH];

        return view('internal.content.form.formAdopsi.edit', [
            'title' => 'Perubahan Formulir Adopsi',
            'pageTitle' => 'Perubahan Formulir Adopsi',
            'pageSubTitle' => 'Perubahan Formulir Adopsi - ' . $userName,
            'detail' => $adoptionForm,
            'adoptionFormStatus' => $status,
            'nonEditableStatuses' => $nonEditableStatuses,
        ]);
    }

    public function editPost(Request $request)
    {
        // dd($request->all());
        if ($request != null) {

            $update = adoptionForm::where('adoption_form_id', $request->adoptionFormID)->update([

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
