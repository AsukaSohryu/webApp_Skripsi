<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use App\Models\AdoptionForm;
use Illuminate\Http\Request;

class StatusAdopsiController extends Controller
{
    public function index(){

        $userId = auth()->id();
        $adoption = AdoptionForm::where('user_id', $userId)->get();

        return view('frontend.pages.status.statusAdopsi', [
            'pagetitle' => 'Status Pengajuan Pengadopsian Hewan',
            'adoptions' => $adoption,
            'user' => $userId

        ]);
    }
}
