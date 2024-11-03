<?php

namespace App\Http\Controllers\internal\home;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $animal = animal::all()->count();

        return view('internal.content.dashboard', [
            'title' => 'Dashboard',
            'pageTitle' => 'Dashboard',
            'pageSubTitle' => 'Dashboard',
            'animal' => $animal
        ]);
    }
}
