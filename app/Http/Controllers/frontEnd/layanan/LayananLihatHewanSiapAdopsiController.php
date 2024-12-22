<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Illuminate\Http\Request;
use App\Models\adoptionQuestions;
use App\Models\User;
use App\Models\shelterInformation;
use App\Models\adoptionForm;
use App\Models\status;

class LayananLihatHewanSiapAdopsiController extends Controller
{
    public function index()
    {
        $animals = animal::where('is_active', 1)
            ->whereIn('status_id', [16, 17, 18])
            ->paginate(9);
        //  dd($animals);

        return view('frontend.pages.layanan.pengadopsian.layananPengadopsian', [
            'pagetitle' => 'Hewan Diselamatkan',
            'animals' => $animals
        ]);
    }

    public function detailHewan($animal_id)
    {
        $animal = animal::findOrFail($animal_id);

        return view('frontend.pages.layanan.pengadopsian.detailHewan', [
            'pagetitle' => 'Detail Hewan',
            'animal' => $animal
        ]);
    }

    public function create($animal_id)
    {
        $adoptionQuestions = adoptionQuestions::where('is_active', 1)->get();
        $user = User::where('user_id', 2)->first(); //USER HARDCODE
        $shelterInformation = shelterInformation::where('shelter_id', 1)->first();
        $animal = animal::findOrFail($animal_id);

        return view('frontend.pages.layanan.pengadopsian.adoptionFormulir', [
            'pagetitle' => 'Detail Hewan',
            'animal' => $animal,
            'adoptionQuestions' => $adoptionQuestions,
            'user' => $user,
            'shelterInformation' => $shelterInformation
        ]);
    }

    public function createPost($animal_id, Request $request)
    {
        // Validate the request
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|string'
        ]);

        // dd($request->all());

        // Retrieve the status_id from the configuration table
        $status = status::where('config', 'Form_Adoption_Status')
            ->where('key', 'REQ')
            ->first();

        $statusId = $status->status_id;

        // Create the adoption form
        $adoptionForm = AdoptionForm::create([
            'user_id' => auth()->id(),
            'animal_id' => $animal_id,
            'status_id' => $statusId,
            'is_seen' => 0,
            'admin_feedback' => '',
        ]);

        // Save the answers
        foreach ($request->answers as $questionId => $answer) {
            $adoptionForm->adoptionQuestions()->attach($questionId, ['answer' => $answer]);
        }

        return redirect()->route('layanan-lihat')->with('success', 'Pengajuan berhasil dibuat!');
    }

    // Logic hewan setelah diajukan adopsi, statusnya berubah
    // Logic di admin ketika hewan pengajuan ditolak, stauts hewan kembali available
}
