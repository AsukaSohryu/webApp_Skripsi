<?php

namespace App\Http\Controllers\internal\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormHandoverController extends Controller
{
    public function index(){

        return view('internal.content.form.formHandover.formHandoverDashboard', [
            'title' => 'Form Handover',
            'pageTitle' => 'Form Handover',
            'pageSubTitle' => 'Form Handover'
        ]);
    }
}
