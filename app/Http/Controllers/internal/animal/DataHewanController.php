<?php

namespace App\Http\Controllers\internal\animal;

use App\Http\Controllers\Controller;
use App\Models\animal;
use App\Models\status;
use Illuminate\Http\Request;

class DataHewanController extends Controller
{
    public function index()
    {

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

    public function detail($animal_id)
    {

        $detail = animal::where('animal_id', $animal_id)->first();
        $name = $detail->animal_name;
        $status = Status::where('status_id', $detail->status_id)->first();
        $animalStatus = $status->status;
        return view('internal.content.animal.detail', [
            'title' => 'Detail Data Hewan ',
            'pageTitle' => 'Detail Data Hewan - ' . $name,
            'pageSubTitle' => 'Detail Data Hewan - ' . $name,
            'detail' => $detail,
            'animalStatus' => $animalStatus
        ]);
    }

    public function edit($animal_id)
    {

        $detail = animal::where('animal_id', $animal_id)->first();
        $status = status::where('config', 'Animal_Status')->get();
        $name = $detail->animal_name;

        return view('internal.content.animal.edit', [
            'title' => 'Perubahan Data Hewan ',
            'pageTitle' => 'Perubahan Data Hewan - ' . $name,
            'pageSubTitle' => 'Perubahan Data Hewan - ' . $name,
            'detail' => $detail,
            'status' => $status,
        ]);
    }

    public function editPost(Request $request)
    {

        // dd($request->all());
        if ($request->fotoHewan == null) {

            $update = animal::where('animal_id', $request->idHewan)->update([
                'animal_name' => $request->namaHewan,
                'animal_type' => $request->jenisHewan,
                'status_id' => $request->statusID,
                'birth_date' => $request->tanggalLahir,
                'color' => $request->warnaHewan,
                'weight' => $request->beratHewan,
                'vaccine' => $request->informasiVaksin,
                'is_sterile' => $request->sterile,
                'source' => $request->asalHewan,
                'characteristics' => $request->karakteristikHewan,
                'description' => $request->deskripsiHewan,
                'medical_note' => $request->catatanMedisHewan,
                'is_active' => $request->activeStatus,
            ]);
        } else {

            $file_web = $request->file('fotoHewan');
            $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

            $path_web = $file_web->storeAs('animal', $file_web_name, 'public');

            $update = animal::where('animal_id', $request->idHewan)->update([

                'photo' => $file_web_name,
                'animal_name' => $request->namaHewan,
                'animal_type' => $request->jenisHewan,
                'status_id' => $request->statusID,
                'birth_date' => $request->tanggalLahir,
                'color' => $request->warnaHewan,
                'weight' => $request->beratHewan,
                'vaccine' => $request->informasiVaksin,
                'is_sterile' => $request->input('sterile'),
                'source' => $request->asalHewan,
                'characteristics' => $request->karakteristikHewan,
                'description' => $request->deskripsiHewan,
                'medical_note' => $request->catatanMedisHewan,
                'is_active' => $request->activeStatus,
            ]);
        }

        // dd($update);
        if ($update) {
            return back()->with('success', 'Data Hewan Berhasil di Update');
        }
    }

    public function create()
    {
        $status = status::where('config', 'Animal_Status')->get();
        return view('internal.content.animal.create', [
            'title' => 'Tambah Hewan Baru',
            'pageTitle' => 'Tambah Hewan Baru',
            'pageSubTitle' => 'Tambah Hewan Baru',
            'status' => $status,
        ]);
    }

    public function createPost(Request $request)
    {

        $file_web = $request->file('fotoHewan');
        $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

        $path_web = $file_web->storeAs('animal', $file_web_name, 'public');

        $create = animal::create([
            'photo' => $file_web_name,
            'animal_name' => $request->namaHewan,
            'animal_type' => $request->jenisHewan,
            'status_id' => $request->statusID,
            'birth_date' => $request->tanggalLahir,
            'sex' => $request->jenisKelamin,
            'race' => $request->rasHewan,
            'color' => $request->warnaHewan,
            'weight' => $request->beratHewan,
            'vaccine' => $request->informasiVaksin,
            'is_sterile' => $request->sterile,
            'source' => $request->asalHewan,
            'characteristics' => $request->karakteristikHewan,
            'description' => $request->deskripsiHewan,
            'medical_note' => $request->catatanMedisHewan,
            'is_active' => $request->activeStatus,
        ]);


        // dd($update);
        if ($create) {
            return back()->with('success', 'Data Hewan Berhasil Dibuat');
        }
    }

    // public function testUploadGambar(Request $request){

    // $file_web = $request->file('gambar');
    // $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

    // $path_web = $file_web->storeAs('animal', $file_web_name, 'public');

    // $edit = animal::where('animal_id', 1)->update([

    //     'photo' => $file_web_name,
    // ]);

    //     if($edit){
    //         return redirect('/dashboard')->with('success_mengubah', 'Update Banner Berhasil');
    //     }
    // }
}
