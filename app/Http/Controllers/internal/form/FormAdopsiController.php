<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormAdopsiController extends Controller
{
    public function index(){

        return view('internal.content.form.formAdopsi', [
            'title' => 'Form Adopsi',
            'pageTitle' => 'Form Adopsi',
            'pageSubTitle' => 'Form Adopsi'
        ]);
    }
}
