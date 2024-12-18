<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shelterInformation;

class TentangKamiController extends Controller
{
    public function index()
    {
        $shelterInformation = shelterInformation::where('shelter_id', 1)->first();
        return view('frontend.pages.tentangKami', [
            'pagetitle' => 'Tentang Kami',
            'shelterInformation' => $shelterInformation
        ]);
    }
}
