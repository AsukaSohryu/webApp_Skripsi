<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiShelterController extends Controller
{
    public function index(){

        return view('internal.content.settings.informasiShelter', [
            'title' => 'Informasi Shelter',
            'pageTitle' => 'Konfigurasi Informasi Shelter',
            'pageSubTitle' => 'Daftar Informasi Shelter',
        ]);
    }
}
