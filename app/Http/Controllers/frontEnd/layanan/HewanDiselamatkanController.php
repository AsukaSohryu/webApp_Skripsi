<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Carbon\Carbon;
use App\Models\status;
use Illuminate\Http\Request;

class HewanDiselamatkanController extends Controller
{
    public function index(){
        $oneWeekAgo = Carbon::now()->subWeek();

        $statusIds = status::where('config', 'Animal_Status')
            ->whereIn('key', ['RES', 'ONC'])
            ->pluck('status_id')
            ->toArray();
        
        $animals = animal::where('is_active', 1)
            ->where('created_at', '>=', $oneWeekAgo)
            ->whereIn('status_id', $statusIds)
            ->orderBy('created_at', 'desc')
            ->get();
            // ->paginate(9);

        return view('frontend.pages.layanan.hewanDiselamatkan', [
            'pagetitle' => 'Hewan Diselamatkan',
            'animals' => $animals
        ]);
    }
}
