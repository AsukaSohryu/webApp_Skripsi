<?php

namespace App\Http\Controllers\frontend\status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusPengajuanPenyerahanHewanController extends Controller
{
    public function index(){

        return view('frontend.pages.status.pengajuan', [
            'pagetitle' => 'Status Pengajuan Penyerahan Hewan'
        ]);
    }
}
