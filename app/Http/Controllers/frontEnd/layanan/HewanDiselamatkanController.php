<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HewanDiselamatkanController extends Controller
{
    public function index(){
        $oneMonthAgo = Carbon::now()->subMonth();
        
        $animals = animal::where('is_active', 1)
            ->where('created_at', '>=', $oneMonthAgo)
            ->whereIn('status_id', [16, 17, 18])
            ->orderBy('created_at', 'desc')
            ->get();
            // ->paginate(9);

        return view('frontend.pages.layanan.hewanDiselamatkan', [
            'pagetitle' => 'Hewan Diselamatkan',
            'animals' => $animals
        ]);
    }
}
