<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananLihatHewanSiapAdopsiController extends Controller
{
    public function index(){

        return view('frontend.pages.layanan.layananPengadopsian', [
            'pagetitle' => 'Hewan Siap Adopsi'
        ]);
    }
}
