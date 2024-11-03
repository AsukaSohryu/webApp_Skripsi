<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusPengajuanPengadopsianHewanController extends Controller
{
    public function index(){

        return view('frontend.pages.status.statusAdopsi', [
            'pagetitle' => 'Status Pengajuan Pengadopsian Hewan'
        ]);
    }
}
