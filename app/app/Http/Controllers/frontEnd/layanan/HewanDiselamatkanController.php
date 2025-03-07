<?php

namespace App\Http\Controllers\frontEnd\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Carbon\Carbon;
use App\Models\status;
use Illuminate\Http\Request;

class HewanDiselamatkanController extends Controller
{
    public function index()
    {
        $oneWeekAgo = Carbon::now()->subWeek();

        $statusIds = status::where('config', 'Animal_Status')
            ->whereIn('key', ['RES', 'ONC'])
            ->pluck('status_id')
            ->toArray();

        // dd($statusIds);

        $animals = animal::where('is_active', 1)
            // ->where('created_at', '>=', $oneWeekAgo)
            ->whereIn('status_id', $statusIds)
            ->orderBy('created_at', 'desc')
            ->get();
         //->paginate(9);

        // dd($animals);

        return view('frontend.pages.layanan.hewanDiselamatkan', [
            'pagetitle' => 'Daftar Hewan yang Diselamatkan',
            'animals' => $animals
        ]);
    }
}
