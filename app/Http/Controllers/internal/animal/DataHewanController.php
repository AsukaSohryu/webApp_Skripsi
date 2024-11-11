<?php

namespace App\Http\Controllers\internal\animal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataHewanController extends Controller
{
    public function viewListAnimal(){

        return view('internal.content.animal.animalDashboard', [
            'title' => 'Data Hewan',
            'pageTitle' => 'Daftar Data Hewan',
            'pageSubTitle' => 'Data Hewan Kucing dan Anjing',
        ]);
    }

    public function viewDetailAnimal($id){

        return view('internal.content.animal.animalDetail', [
            'title' => 'Data Hewan',
            'pageTitle' => 'Detail Data Hewan',
            'pageSubTitle' => 'Detail Data Hewan Kucing dan Anjing',
            'id' => $id,
        ]);
    }

    public function createAnimal(){

        return view('internal.content.animal.animalCreate', [
            'title' => 'Data Hewan',
            'pageTitle' => 'Tambah Data Hewan',
            'pageSubTitle' => 'Tambah Data Hewan Kucing dan Anjing',
        ]);
    }

    public function updateAnimal($id){

        return view('internal.content.animal.animalUpdate', [
            'title' => 'Data Hewan',
            'pageTitle' => 'Ubah Data Hewan',
            'pageSubTitle' => 'Ubah Data Hewan Kucing dan Anjing',
            'id' => $id,
        ]);
    }

    private function getListAnimal(){

        $data = animal::all();

        return response()->json($data);
    }

}
