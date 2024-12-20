<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Illuminate\Http\Request;
use App\Models\adoptionQuestions;
use App\Models\User;
use App\Models\shelterInformation;
use App\Models\adoptionForm;

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
        // dd($request->all());

        $adoptionForm = adoptionForm::create([
            'user_id' => 1, // Hardcoded 
            'animal_id' => $animal_id,
            'status_id' => 11,
            'is_seen' => 0,
            'admin_feedback' => '',
        ]);

        // foreach ($request->answers as $questionId => $answer) {
        //     $handoverForm->handoverQuestions()->attach($questionId, ['answer' => $answer]);
        // }

        return redirect()->route('layanan-lihat')->with('success', 'Pengajuan berhasil dibuat!');
    }
}
