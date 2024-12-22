<?php

namespace App\Http\Controllers\frontend\layanan;

use App\Http\Controllers\Controller;
use App\Models\reportForm;
use App\Models\shelterInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\status;
use App\Models\User;

class LayananLaporanHewanHilangController extends Controller
{
    public function index()
    {

        $shelterInformation = shelterInformation::where('shelter_id', 1)->first();
        $userID = auth()->id();
        $user = User::where('user_id', $userID)->first();
        return view('frontend.pages.layanan.layananPenemuan', [
            'pagetitle' => 'Layanan Pelaporan Hewan Hilang',
            'shelterInformation' => $shelterInformation,
            'user' => $user
        ]);
    }

    public function indexPost(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'fotoHewan' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'fotoLokasi' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'fotoBebas' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        if ($request->hasFile('fotoHewan')) {
            $file_web_animal_photo = $request->file('fotoHewan');
            $file_web_name_animal_photo = uniqid() . '.' . $file_web_animal_photo->getClientOriginalExtension();
            $file_web_animal_photo->storeAs('formReport', $file_web_name_animal_photo, 'public');
        }

        if ($request->hasFile('fotoLokasi')) {
            $file_web_location_photo = $request->file('fotoLokasi');
            $file_web_name_location_photo = uniqid() . '.' . $file_web_location_photo->getClientOriginalExtension();
            $file_web_location_photo->storeAs('formReport', $file_web_name_location_photo, 'public');
        }

        if ($request->hasFile('fotoBebas')) {
            $file_web_additional_photo = $request->file('fotoBebas');
            $file_web_name_additional_photo = uniqid() . '.' . $file_web_additional_photo->getClientOriginalExtension();
            $file_web_additional_photo->storeAs('formReport', $file_web_name_additional_photo, 'public');
        }

        $status = status::where('config', 'Form_Report_Status')
            ->where('key', 'REQ')
            ->first();

        $statusId = $status->status_id;

        $create = ReportForm::create([
            'user_id' => auth()->id(),
            'status_id' => $statusId,
            'animal_type' => $request->jenisHewan,
            'location' => $request->lokasi,
            'location_map' => $request->lokasiMaps,
            'animal_photo' => $file_web_name_animal_photo,
            'location_photo' => $file_web_name_location_photo,
            'additional_photo' => $file_web_name_additional_photo,
            'is_seen' => 0,
            'description' => $request->deskripsi,
            'admin_feedback' => null,
            'admin_feedback_photo' => null,
        ]);

        // dd($update);
        if ($create) {
            return back()->with('success', 'Data Laporan Berhasil Dibuat');
        }
    }
}
