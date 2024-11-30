<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use App\Models\adoptionQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PertanyaanPengadopsianController extends Controller
{
    public function index(){

        $adoptionQuestions = adoptionQuestions::all();

        return view('internal.content.settings.adoptionQuestions.pertanyaanAdopsi', [
            'title' => 'Pertanyaan Pengadopsian',
            'pageTitle' => 'Konfigurasi Pertanyaan Pengadopsian',
            'pageSubTitle' => 'Daftar Pertanyaan Formulir Pengadopsian Hewan',
            'adoptionQuestions' => $adoptionQuestions,
        ]);
    }

    public function edit(){

        $adoptionQuestions = adoptionQuestions::all();

        return view('internal.content.settings.adoptionQuestions.edit', [
            'title' => 'Edit Pertanyaan Pengadopsian',
            'pageTitle' => 'Konfigurasi Pertanyaan Pengadopsian',
            'pageSubTitle' => 'Perubahan Daftar Pertanyaan Formulir Pengadopsian Hewan',
            'adoptionQuestions' => $adoptionQuestions,
        ]);
    }

    public function editPost(Request $request){
        try {
            // DB::beginTransaction();

            // Handle existing questions status updates
            $activeStatus = $request->input('activeStatus', []);
            if (!empty($activeStatus)) {
                foreach ($activeStatus as $questionId => $status) {
                    AdoptionQuestions::where('adoption_question_id', $questionId)
                        ->update([
                            'is_active' => $status === "on" ? 1 : 0
                        ]);
                }
            }

            // Handle new questions
            $newQuestions = $request->input('new_questions', []);
            $newActiveStatus = $request->input('new_activeStatus', []);
            
            if (!empty($newQuestions)) {
                foreach ($newQuestions as $index => $question) {
                    if (!empty($question)) {
                        AdoptionQuestions::create([
                            'questions' => $question,
                            'is_active' => isset($newActiveStatus[$index]) ? 1 : 0
                        ]);
                    }
                }
            }
        
            // DB::commit();

            return redirect()
                ->route('pertanyaanPengadopsian.index')
                ->with('success', 'Pertanyaan pengadopsian berhasil diperbarui');
                
        } catch (\Exception $e) {
            // DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui pertanyaan pengadopsian: ' . $e->getMessage());
        }
    }
}