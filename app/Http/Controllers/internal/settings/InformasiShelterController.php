<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use App\Models\shelterInformation;
use Illuminate\Http\Request;

class InformasiShelterController extends Controller
{
    public function index()
    {
        $shelterInformation = shelterInformation::where('shelter_id', 1)->first();

        return view('internal.content.settings.shelterInformation.informasiShelter', [
            'title' => 'Informasi Shelter',
            'pageTitle' => 'Konfigurasi Informasi Shelter',
            'pageSubTitle' => 'Daftar Informasi Shelter',
            'shelterInformation' => $shelterInformation
        ]);
    }

    public function edit()
    {
        $detail = shelterInformation::where('shelter_id', 1)->first();

        return view('internal.content.settings.shelterInformation.edit', [
            'title' => 'Informasi Shelter', 
            'pageTitle' => 'Konfigurasi Informasi Shelter',
            'pageSubTitle' => 'Daftar Informasi Shelter',
            'shelterInformation' => $detail
        ]);
    }


    public function editPost(Request $request)
    {
        // dd($request->all());
        // if ($request->fotoHewan == null) {
        if ($request != null) {

            $update = shelterInformation::where('shelter_id', 1)->update([

                'shelter_name' => $request->namaShelter,
                // 'shelter_logo' => $request->shelterLogo,
                'address' => $request->alamatShelter,
                'email' => $request->emailShelter,
                'operational_hour' => $request->operationalHour,
                'whatsapp_number' => $request->noWhatsapp,
                'phone_number' => $request->noTelepon,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'donation_information' => $request->donationInformation,
                // 'shelter_photo' => $request->shelterLogo,
                'about_shelter' => $request->aboutUs,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'founder_name' => $request->fname,
                // 'founder_photo' => $request->shelterLogo,
                'founder_description' => $request->fdesc,
                'history' => $request->history,
                'additional_information' => $request->addInfo,
                // 'is_accepting_report' => $request->shelterLogo,
                // 'is_accepting_handover' => $request->shelterLogo,
                // 'is_accepting_adoption' => $request->shelterLogo,
                'report_information' => $request->reportInfo,
                'handover_information' => $request->handoverInfo,
                'adoption_information' => $request->adoptionInfo,

            ]);
        }
        // else {

        //     $file_web = $request->file('fotoHewan');
        //     $file_web_name = uniqid() . '.' . $file_web->getClientOriginalExtension();

        //     $path_web = $file_web->storeAs('animal', $file_web_name, 'public');

        //     $update = shelterInformation::where('animal_id', $request->idHewan)->update([

        //         'photo' => $file_web_name,
        //         'animal_name' => $request->namaHewan,
        //         'animal_type' => $request->jenisHewan,
        //         'age' => $request->usiaHewan,
        //         'status_id' => $request->statusID,
        //         'birth_date' => $request->tanggalLahir,
        //         'color' => $request->warnaHewan,
        //         'weight' => $request->beratHewan,
        //         'vaccine' => $request->informasiVaksin,
        //         'is_sterile' => $request->input('sterile'),
        //         'source' => $request->asalHewan,
        //         'characteristics' => $request->karakteristikHewan,
        //         'description' => $request->deskripsiHewan,
        //         'medical_note' => $request->catatanMedisHewan,
        //         'is_active' => $request->activeStatus,
        //     ]);
        // }

        // dd($update);
        if ($update) {
            return back()->with('success', 'Data Hewan Berhasil di Update');
        }
    }
}
