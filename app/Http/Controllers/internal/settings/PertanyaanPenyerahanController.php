<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use App\Models\handoverQuestions;

class PertanyaanPenyerahanController extends Controller
{
    public function index(){

        $handoverQuestions = handoverQuestions::all();

        return view('internal.content.settings.handoverQuestions.pertanyaanPenyerahan', [
            'title' => 'Pertanyaan Penyerahan',
            'pageTitle' => 'Konfigurasi Pertanyaan Penyerahan',
            'pageSubTitle' => 'Daftar Pertanyaan Formulir Penyerahan Hewan',
            'handoverQuestions' => $handoverQuestions,
        ]);
    }
}
