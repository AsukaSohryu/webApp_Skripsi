<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LayananLaporanHewanHilangController extends Controller
{
    public function index(){

        return view('frontend.pages.layanan.layananPenemuan', [
            'pagetitle' => 'Layanan Pelaporan Hewan Hilang'
        ]);
    }

    public function indexPost(Request $request){
        // dd($request->all());

        $request->validate([
            'fotoHewan' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'fotoLokasi' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'fotoBebas' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        // Handle fotoHewan
        $fotoHewan = $request->file('fotoHewan');
        $fotoHewanName = uniqid() . '.' . $fotoHewan->getClientOriginalExtension();
        $fotoHewan->storeAs('report-photos', $fotoHewanName, 'public');

        // Handle fotoLokasi
        $fotoLokasi = $request->file('fotoLokasi');
        $fotoLokasiName = uniqid() . '.' . $fotoLokasi->getClientOriginalExtension();
        $fotoLokasi->storeAs('report-photos', $fotoLokasiName, 'public');

        // Handle optional fotoBebas
        $fotoBebasName = null;
        if ($request->hasFile('fotoBebas')) {
            $fotoBebas = $request->file('fotoBebas');
            $fotoBebasName = uniqid() . '.' . $fotoBebas->getClientOriginalExtension();
            $fotoBebas->storeAs('report-photos', $fotoBebasName, 'public');
        }     

        // Concatenate photo names
        $photos = implode(';', array_filter([$fotoHewanName, $fotoLokasiName, $fotoBebasName]));

        $create = ReportForm::create([
            'photo' => $photos,
            // TODO: Change user_id to authenticated user
            'user_id' => 1,
            'status_id' => 1,
            'admin_feedback' => null,
            'animal_type' => $request->jenisHewan,
            'location' => $request->lokasi,
            'location_map' => $request->lokasiMaps,
            'description' => $request->deskripsi,
            'is_seen' => 0,

        ]);
    
        // dd($update);
        if ($create) {
            return back()->with('success', 'Data Laporan Berhasil Dibuat');
        }
    }
}
