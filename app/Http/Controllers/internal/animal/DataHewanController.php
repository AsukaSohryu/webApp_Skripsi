<?php

namespace App\Http\Controllers\internal\animal;

use App\Http\Controllers\Controller;
use App\Models\animal;
use App\Models\status;
use Database\Seeders\AnimalSeeder;
use Illuminate\Http\Request;

class DataHewanController extends Controller
{
    public function index(){

        $animal = animal::all();
        $status = status::all();
        // dd($status);

        return view('internal.content.animal.animalDashboard', [
            'title' => 'Data Hewan',
            'pageTitle' => 'Daftar Data Hewan',
            'pageSubTitle' => 'Data Hewan Kucing dan Anjing',
            'animal' => $animal,
            'status' => $status,
        ]);
    }

    public function detail($animal_id){

        $detail = animal::where('animal_id', $animal_id)->first();
        // dd($detail);
        $name = $detail->animal_name;

        return view('internal.content.animal.detail',[
            'title' => 'Detail Data Hewan',
            'pageTitle' => 'Detail Data Hewan',
            'pageSubTitle' => $name,
            'detail' => $detail,
        ]);
    }
    
    // public function testUploadGambar(Request $request){

    //     $file_web = $request->file('gambar');
    //     $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

    //     $path_web = $file_web->storeAs('animal', $file_web_name, 'public');

    //     $edit = animal::where('animal_id', 1)->update([

    //         'photo' => $file_web_name,
    //     ]);

    //     if($edit){
    //         return redirect('/dashboard')->with('success_mengubah', 'Update Banner Berhasil');
    //     }
    // }
}
