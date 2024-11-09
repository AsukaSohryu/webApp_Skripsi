<?php

namespace App\Http\Controllers\internal\animal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataHewanController extends Controller
{
    public function index(){

        return view('internal.content.animal.animalDashboard', [
            'title' => 'Data Hewan',
            'pageTitle' => 'Daftar Data Hewan',
            'pageSubTitle' => 'Data Hewan Kucing dan Anjing',
        ]);
    }
}
