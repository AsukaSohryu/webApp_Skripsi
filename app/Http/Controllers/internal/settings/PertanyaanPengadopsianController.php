<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use App\Models\AdoptionQuestions;

class PertanyaanPengadopsianController extends Controller
{
    public function index(){

        $adoptionQuestions = adoptionQuestions::all();

        return view('internal.content.settings.adoptionQuestions.pertanyaanAdopsi', [
            'title' => 'Pertanyaan Pengadopsian',
            'pageTitle' => 'Konfigurasi Pertanyaan Pengadopsian',
            'pageSubTitle' => 'Daftar Pertanyaan Formulir Pengadopsian Hewan',
            'adoptionQuestions' => $adoptionQuestions,
        ]);
    }
}