<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusLaporanPenemuanHewanHilangController extends Controller
{
    public function index(){

        return view('frontend.pages.status.penemuan', [
            'pagetitle' => 'Status Laporan Penemuan Hewan Hilang'
        ]);
    }
}
