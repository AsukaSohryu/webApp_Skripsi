<?php

namespace App\Http\Controllers\frontEnd\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Illuminate\Http\Request;
use App\Models\adoptionQuestions;
use App\Models\User;
use App\Models\shelterInformation;
use App\Models\adoptionForm;
use App\Models\status;
use Illuminate\Support\Facades\Hash;

class LayananLihatHewanSiapAdopsiController extends Controller
{
    public function index()
    {
        $animals = animal::where('is_active', 1)
            ->with('status')
            ->paginate(9);
        //  dd($animals);
        $shelterInformation = shelterInformation::where('shelter_id', 1)->first();

        return view('frontend.pages.layanan.pengadopsian.layananPengadopsian', [
            'pagetitle' => 'Hewan Diselamatkan',
            'animals' => $animals,
            'shelterInformation' => $shelterInformation
        ]);
    }

    public function detailHewan($animal_id)
    {
        $animal = animal::findOrFail($animal_id);
        $statusAVL = Status::where('config', 'Animal_Status')
            ->where('key', 'AVL')
            ->first();

        return view('frontend.pages.layanan.pengadopsian.detailHewan', [
            'pagetitle' => 'Detail Hewan',
            'animal' => $animal,
            'statusAVL' => $statusAVL->status_id
        ]);
    }

    public function create($animal_id)
    {
        $adoptionQuestions = adoptionQuestions::where('is_active', 1)->get();
        $userID = auth()->id();
        $user = User::where('user_id', $userID)->first();
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

        $status = status::where('config', 'Form_Adoption_Status')
            ->where('key', 'REQ')
            ->first();

        $statusId = $status->status_id;

        $adoptionForm = AdoptionForm::create([
            'user_id' => auth()->id(),
            'animal_id' => $animal_id,
            'status_id' => $statusId,
            'is_seen' => 0,
        ]);

        foreach ($request->answers as $questionId => $answer) {
            $adoptionForm->adoptionQuestions()->attach($questionId, ['answer' => $answer]);
        }

        $statusAnimal = status::where('config', 'Animal_Status')
            ->where('key', 'RSV')
            ->first();

        $statusAnimalId = $statusAnimal->status_id;

        $update = animal::where('animal_id', $animal_id)->update([
            'status_id' => $statusAnimalId,
            'detail_status' => 'Dalam proses adopsi'
        ]);

        if ($update) {
            return redirect()->route('layanan-lihat')->with('success', 'Pengajuan berhasil dibuat!');
        } else {
            return redirect()->route('layanan-lihat')->with('error', 'Pengajuan gagal dibuat!');
        }
    }
}
