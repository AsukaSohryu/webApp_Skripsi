<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananPengajuanPenyerahanHewanController extends Controller
{
    public function index(){

        return view('frontend.pages.layanan.layananPengajuan', [
            'pagetitle' => 'Pengajuan Penyerahan hewan'
        ]);
    }
}
