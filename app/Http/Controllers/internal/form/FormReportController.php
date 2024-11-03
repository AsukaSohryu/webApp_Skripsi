<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormReportController extends Controller
{
    public function index(){

        return view('internal.content.form.formReport', [
            'title' => 'Form Report',
            'pageTitle' => 'Form Report',
            'pageSubTitle' => 'Form Report'
        ]);
    }
}
