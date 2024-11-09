<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PertanyaanPenyerahanController extends Controller
{
    public function index(){

        return view('internal.content.settings.pertanyaanPenyerahan', [
            'title' => 'Pertanyaan Penyerahan',
            'pageTitle' => 'Konfigurasi Pertanyaan Penyerahan',
            'pageSubTitle' => 'Daftar Pertanyaan Formulir Penyerahan Hewan',
        ]);
    }
}
