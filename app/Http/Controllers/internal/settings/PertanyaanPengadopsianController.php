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
                        $isActive = isset($newActiveStatus[$index]) && $newActiveStatus[$index] == "1";
                        
                        AdoptionQuestions::create([
                            'questions' => $question,
                            'is_active' => $isActive ? 1 : 0
                        ]);
                    }
                }
            }

            return redirect()
                ->route('pertanyaanPengadopsian.index')
                ->with('success', 'Pertanyaan pengadopsian berhasil diperbarui');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui pertanyaan pengadopsian: ' . $e->getMessage());
        }
    }

    public function deleteQuestion($adoption_question_id)
    {
        $question = adoptionQuestions::findOrFail($adoption_question_id);

        // dd($question->adoptionForm()->count());

        // Check if the question has any related answers
        if ($question->adoptionForm()->count() == 0) {
            // If there are no related answers, delete the question
            $question->delete();
            return redirect()->route('pertanyaanPengadopsian.index')->with('success', 'Pertanyaan Berhasil Dihapus');
        } else {
            // dd('tes');
            return redirect()->route('pertanyaanPengadopsian.index')->with('error', 'Pertanyaan Digunakan di Formulir Pengadopsian');
        }
    }

}