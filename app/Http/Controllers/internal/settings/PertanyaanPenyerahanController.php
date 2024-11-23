<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;

class PertanyaanPenyerahanController extends Controller
{
    public function index(){

        return view('internal.content.settings.handoverQuestions.pertanyaanPenyerahan', [
            'title' => 'Pertanyaan Penyerahan',
            'pageTitle' => 'Konfigurasi Pertanyaan Penyerahan',
            'pageSubTitle' => 'Daftar Pertanyaan Formulir Penyerahan Hewan',
        ]);
    }
}
