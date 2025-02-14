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
            'pageTitle' => 'Informasi Shelter',
            'pageSubTitle' => 'Informasi Shelter',
            'shelterInformation' => $shelterInformation
        ]);
    }

    public function edit()
    {
        $detail = shelterInformation::where('shelter_id', 1)->first();

        return view('internal.content.settings.shelterInformation.edit', [
            'title' => 'Ubah Informasi Shelter',
            'pageTitle' => 'Ubah Informasi Shelter',
            'pageSubTitle' => 'Ubah Informasi Shelter',
            'shelterInformation' => $detail
        ]);
    }

    public function editPost(Request $request)
    {

        $updateData = [
            'shelter_name' => $request->namaShelter,
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
            'about_shelter' => $request->aboutUs,
            'vision' => $request->vision,
            'mission' => $request->mission,
            'founder_name' => $request->fname,
            'founder_description' => $request->fdesc,
            'history' => $request->history,
            'additional_information' => $request->addInfo,
            'is_accepting_report' => $request->is_accepting_report,
            'is_accepting_handover' => $request->is_accepting_handover,
            'is_accepting_adoption' => $request->is_accepting_adoption,
            'report_information' => $request->reportInfo,
            'handover_information' => $request->handoverInfo,
            'adoption_information' => $request->adoptionInfo,
        ];

        if ($request->hasFile('shelterLogo')) {
            $file_web_shelter_logo = $request->file('shelterLogo');
            $file_web_name_shelter_logo = $file_web_shelter_logo->getClientOriginalName();
            $file_web_shelter_logo->move('uploadedImages/informasiShelter', $file_web_name_shelter_logo);
            $updateData['shelter_logo'] = $file_web_name_shelter_logo;
        }

        if ($request->hasFile('shelterPhoto')) {
            $file_web_shelter_photo = $request->file('shelterPhoto');
            $file_web_name_shelter_photo = $file_web_shelter_photo->getClientOriginalName();
            $file_web_shelter_photo->move('uploadedImages/informasiShelter', $file_web_name_shelter_photo);
            $updateData['shelter_photo'] = $file_web_name_shelter_photo;
        }

        if ($request->hasFile('founderPhoto')) {
            $file_web_founder_photo = $request->file('founderPhoto');
            $file_web_name_founder_photo = $file_web_founder_photo->getClientOriginalName();
            $file_web_founder_photo->move('uploadedImages/informasiShelter', $file_web_name_founder_photo);
            $updateData['founder_photo'] = $file_web_name_founder_photo;
        }

        $update = shelterInformation::where('shelter_id', 1)->update($updateData);

        if ($update) {
            return redirect()->route('informasiShelter.index')->with('success', 'Data Informasi Shelter Berhasil di Update');
        }
    }
}
