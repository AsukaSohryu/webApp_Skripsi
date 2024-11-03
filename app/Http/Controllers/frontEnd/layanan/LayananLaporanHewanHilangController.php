<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananLaporanHewanHilangController extends Controller
{
    public function index(){

        return view('frontend.pages.layanan.layananPenemuan', [
            'pagetitle' => 'Layanan Pelaporan Hewan Hilang'
        ]);
    }
}
