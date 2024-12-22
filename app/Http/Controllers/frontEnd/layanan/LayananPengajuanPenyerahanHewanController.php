<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\handoverQuestions;
use App\Models\User;
use App\Models\shelterInformation;
use App\Models\handoverForm;
use App\Models\status;

class LayananPengajuanPenyerahanHewanController extends Controller
{
    public function index()
    {
        $handoverQuestions = handoverQuestions::where('is_active', 1)->get();
        $user = User::where('user_id', 1)->first(); //USER HARDCODE
        $shelterInformation = shelterInformation::where('shelter_id', 1)->first();

        return view('frontend.pages.layanan.layananPengajuan', [
            'pagetitle' => 'Formulir Pengajuan Penyerahan hewan',
            'handoverQuestions' => $handoverQuestions,
            'user' => $user,
            'shelterInformation' => $shelterInformation
        ]);
    }

    public function createPost(Request $request)
    {
        $file_web = $request->file('fotoHewanHandover');
        $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

        $path_web = $file_web->storeAs('formHandover', $file_web_name, 'public');

        $status = status::where('config', 'Form_Handover_Status')
            ->where('key', 'REQ')
            ->first();

        $statusId = $status->status_id;

        $handoverForm = handoverForm::create([
            'user_id' => auth()->id(),
            'status_id' => $statusId,
            'photo' =>  $file_web_name,
            'is_seen' => 0,
            'admin_feedback' => '',
        ]);

        foreach ($request->answers as $questionId => $answer) {
            $handoverForm->handoverQuestions()->attach($questionId, ['answer' => $answer]);
        }

        return redirect()->route('layanan-pengajuan')->with('success', 'Pengajuan berhasil dibuat!');
    }
}
