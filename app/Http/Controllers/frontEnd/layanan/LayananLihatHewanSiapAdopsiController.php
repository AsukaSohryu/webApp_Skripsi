<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\animal;
use Illuminate\Http\Request;

class LayananLihatHewanSiapAdopsiController extends Controller
{
    public function index(){
        $animals = animal::where('is_active', 1)
                         ->whereIn('status_id', [16, 17, 18])
                         ->paginate(9);
        //  dd($animals);
        
        return view('frontend.pages.layanan.pengadopsian.layananPengadopsian', [
            'pagetitle' => 'Hewan Diselamatkan',
            'animals' => $animals
        ]);
    }

    public function detailHewan($animal_id){
        $animal = animal::findOrFail($animal_id);
        
        return view('frontend.pages.layanan.pengadopsian.detailHewan', [
            'pagetitle' => 'Detail Hewan',
            'animal' => $animal
        ]);
    }

    public function adoptionFormulir($animal_id){
        $animal = animal::findOrFail($animal_id);
        
        return view('frontend.pages.layanan.pengadopsian.adoptionFormulir', [
            'pagetitle' => 'Detail Hewan',
            'animal' => $animal
        ]);
    }
}
