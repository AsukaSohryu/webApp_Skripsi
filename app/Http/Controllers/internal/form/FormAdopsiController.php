<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\adoptionForm;
use App\Models\animal;
use Illuminate\Http\Request;
use App\Models\status;
use GuzzleHttp\Psr7\Query;

class FormAdopsiController extends Controller
{

    public function index()
    {
        $adoptionForm = adoptionForm::with(['users', 'status', 'animal'])->get();

        return view('internal.content.form.formAdopsi.formAdopsiDashboard', [
            'title' => 'Daftar Formulir Pengajuan Pengadopsian Hewan',
            'pageTitle' => 'Daftar Formulir Pengajuan Pengadopsian Hewan',
            'pageSubTitle' => 'Daftar Formulir Pengajuan Pengadopsian Hewan',
            'adoptionForm' => $adoptionForm
        ]);
    }

    public function toggleIsSeen($id)
    {

        $notification = adoptionForm::findOrFail($id);
        $notification->is_seen = !$notification->is_seen;
        $notification->save();
        return back()->with('success', 'Notification status updated!');
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
            'title' => 'Detail Formulir Pengajuan Pengadopsian Hewan',
            'pageTitle' => 'Detail Formulir Pengajuan Pengadopsian Hewan',
            'pageSubTitle' => 'Detail Formulir Pengajuan Pengadopsian Hewan - ' . $userName,
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
            'title' => 'Edit Formulir Pengajuan Pengadopsian Hewan',
            'pageTitle' => 'Edit Formulir Pengajuan Pengadopsian Hewan',
            'pageSubTitle' => 'Edit Formulir Pengajuan Pengadopsian Hewan - ' . $userName,
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

            $status = status::where('config', 'Form_Adoption_Status')->get();
            $statusRJT = $status->where('key', 'RJT')->first()->status_id ?? null;
            $statusCAN = $status->where('key', 'CAN')->first()->status_id ?? null;
            $statusSUC = $status->where('key', 'SUC')->first()->status_id ?? null;

            $statusAnimal = status::where('config', 'Animal_Status')->get();
            $statusAVL = $statusAnimal->where('key', 'AVL')->first()->status_id ?? null;
            $statusADP = $statusAnimal->where('key', 'ADP')->first()->status_id ?? null;

            // Update animal status to available if the form is rejected or cancelled
            if ($request->statusID == $statusRJT || $request->statusID == $statusCAN) {
                $update = animal::where('animal_id', $request->animalID)->update([
                    'status_id' => $statusAVL,
                ]);
            }

            // Update animal status to adopted if the form is Succeed
            if ($request->statusID == $statusSUC) {
                $update = animal::where('animal_id', $request->animalID)->update([
                    'status_id' => $statusADP,
                ]);
            }
        }

        // dd($update);
        if ($update) {
            return redirect()->route('formAdopsi.detail', $request->adoptionFormID)->with('success', 'Formulir Pengajuan Pengadopsian Hewan Berhasil diperbaharui');
        }
    }
}
