<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index(){

        return view('frontend.pages.tentangKami', [
            'pagetitle' => 'Tentang Kami'
        ]);
    }
}
