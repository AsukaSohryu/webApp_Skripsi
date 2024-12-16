<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use App\Models\handoverForm;
use Illuminate\Http\Request;
use App\Models\status;
use App\Models\animal;

class FormHandoverController extends Controller
{
    public function index()
    {
        $handoverForm = handoverForm::with(['users', 'status'])->get();

        return view('internal.content.form.formHandover.formHandoverDashboard', [
            'title' => 'Form Penyerahan',
            'pageTitle' => 'Daftar Formulir Penyerahan',
            'pageSubTitle' => 'Daftar Formulir Penyerahan',
            'handoverForm' => $handoverForm

        ]);
    }

    public function detail($handover_form_id)
    {
        $handoverForm = handoverForm::with(['users', 'status', 'handoverQuestions' => function ($query) {
            $query->withPivot('answer');
        }])->findOrFail($handover_form_id);

        if (!$handoverForm) {
            // Handle the case where the adoption form is not found (e.g., redirect or show an error)
            return redirect()->back()->with('error', 'Adoption form not found.');
        }

        $userName = $handoverForm->users->name;

        $handoverForm->is_seen = 1;
        $handoverForm->save();

        return view('internal.content.form.formHandover.detail', [
            'title' => 'Detail Formulir Penyerahan',
            'pageTitle' => 'Detail Formulir Penyerahan',
            'pageSubTitle' => 'Formulir Penyerahan - ' . $userName,
            'detail' => $handoverForm,

        ]);
    }

    public function edit($handover_form_id)
    {
        $handoverForm = handoverForm::with(['users', 'status', 'handoverQuestions' => function ($query) {
            $query->withPivot('answer');
            // dd($query->withPivot('answer'));
        }])->findOrFail($handover_form_id);
        $status = status::where('config', 'Form_Handover_Status')->get();
        $userName = $handoverForm->users->name;

        // dd($handoverForm->all());

        return view('internal.content.form.formHandover.edit', [
            'title' => 'Perubahan Formulir Penyerahan',
            'pageTitle' => 'Perubahan Formulir Penyerahan',
            'pageSubTitle' => 'Perubahan Formulir Penyerahan - ' . $userName,
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
            ]);

            $successCreate = 'false';
            if ($request->statusID == 9) {
                    $handoverForm = handoverForm::with(['users', 'status', 'handoverQuestions' => function ($query) {
                        $query->withPivot('answer');
                }])->findOrFail($request->handoverFormID);

                foreach ($handoverForm->handoverQuestions as $question) {

                    if ($question->handover_questions_id == 1) {
                        $animalName = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 2) {
                        $animalType = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 3) {
                        $age = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 4) {
                        $birth_date = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 5) {
                        $sex = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 6) {
                        $race = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 7) {
                        $color = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 8) {
                        $weight = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 9) {
                        $vaccine = $question->pivot->answer;
                    } else if ($question->handover_questions_id == 10) {
                        $is_sterile = $question->pivot->answer;
                    }
                }
                // dd($weight);
                $newAnimal = animal::create([
                    'status_id' => 17,
                    'animal_name' => $animalName,
                    'animal_type' => $animalType,
                    'age' => $age,
                    'birth_date' => $birth_date,
                    'sex' => $sex,
                    'race' => $race,
                    'color' => $color,
                    'weight' => $weight,
                    'vaccine' => $vaccine,
                    'is_sterile' => $is_sterile,
                    'source' => 'Diserahkan pemilik lama',
                    'characteristics' => 'Belum ada data',
                    'description' => 'Belum ada data',
                    'medical_note' => 'Belum ada data',
                    'photo' => ' ',
                    'is_active' => 1,
                ]);
                $successCreate = 'true';
            }
        }

        // dd($update);
        if ($update) {
            $message = 'Form Penyerahan Berhasil di Update';

            if ($successCreate == 'true') {
                $message = 'Form Penyerahan Berhasil di Update, Data Hewan Berhasil dibuat';
            }
            return back()->with('success', $message);
        }
    }

    public function testUploadGambar(Request $request)
    {

        $file_web = $request->file('gambar');
        $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

        $path_web = $file_web->storeAs('formHandover', $file_web_name, 'public');

        $edit = handoverForm::where('handover_form_id', 1)->update([

            'photo' => $file_web_name,
        ]);

        if ($edit) {
            return redirect('/dashboard')->with('Insert Sukses');
        }
    }
}
