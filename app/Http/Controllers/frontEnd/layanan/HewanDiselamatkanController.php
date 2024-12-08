<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HewanDiselamatkanController extends Controller
{
    public function index(){

        return view('frontend.pages.layanan.hewanDiselamatkan', [
            'pagetitle' => 'Hewan Diselamatkan'
        ]);
    }
}
