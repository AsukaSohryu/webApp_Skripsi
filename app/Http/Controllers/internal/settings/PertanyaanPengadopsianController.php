<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PertanyaanPengadopsianController extends Controller
{
    public function index(){

        return view('internal.content.settings.pertanyaanAdopsi', [
            'title' => 'Pertanyaan Pengadopsian',
            'pageTitle' => 'Konfigurasi Pertanyaan Pengadopsian',
            'pageSubTitle' => 'Daftar Pertanyaan Formulir Pengadopsian Hewan',
        ]);
    }
}
