<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use App\Models\status;
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

    public function detail($animal_id)
    {
        $animal = animal::findOrFail($animal_id);

        return view('frontend.pages.layanan.pengadopsian.detailHewan', [
            'pagetitle' => 'Detail Hewan',
            'animal' => $animal
        ]);
    }

    // public function detail($animal_id){
    //     $animal = animal::with(['status'])
    //         ->findOrFail($animal_id);

    //     if (!$animal) {
    //         return redirect()->back()->with('error', 'Animal not found.');
    //     }

    //     $status = Status::where('config', 'Animal_Status')->get();

    //     return view('frontend.pages.layanan.hewanDiselamatkan.detail', [
    //         'pagetitle' => 'Hewan Diselaamatkan',
    //         'animal' => $animal
    //     ]);
    // }
}
