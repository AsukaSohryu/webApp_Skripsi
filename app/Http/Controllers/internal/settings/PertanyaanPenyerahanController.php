<?php

namespace App\Http\Controllers\internal\settings;

use App\Http\Controllers\Controller;
use App\Models\handoverQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PertanyaanPenyerahanController extends Controller
{
    public function index(){

        $handoverQuestions = handoverQuestions::all();

        return view('internal.content.settings.handoverQuestions.pertanyaanPenyerahan', [
            'title' => 'Pertanyaan Penyerahan',
            'pageTitle' => 'Konfigurasi Pertanyaan Penyerahan',
            'pageSubTitle' => 'Daftar Pertanyaan Formulir Penyerahan Hewan',
            'handoverQuestions' => $handoverQuestions,
        ]);
    }

    public function edit(){

        $handoverQuestions = handoverQuestions::all();

        return view('internal.content.settings.handoverQuestions.edit', [
            'title' => 'Edit Pertanyaan Penyerahan',
            'pageTitle' => 'Konfigurasi Pertanyaan Penyerahan',
            'pageSubTitle' => 'Perubahan Daftar Pertanyaan Formulir Penyerahan Hewan',
            'handoverQuestions' => $handoverQuestions,
        ]);
    }

    public function editPost(Request $request){
        try {
            // DB::beginTransaction();

            // Handle existing questions status updates
            $activeStatus = $request->input('activeStatus', []);
            if (!empty($activeStatus)) {
                foreach ($activeStatus as $questionId => $status) {
                    handoverQuestions::where('handover_questions_id', $questionId)
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
                        handoverQuestions::create([
                            'questions' => $question,
                            'is_active' => isset($newActiveStatus[$index]) ? 1 : 0
                        ]);
                    }
                }
            }
        
            // DB::commit();

            return redirect()
                ->route('pertanyaanPenyerahan.index')
                ->with('success', 'Pertanyaan penyerahan berhasil diperbarui');
                
        } catch (\Exception $e) {
            // DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui pertanyaan penyerahan: ' . $e->getMessage());
        }
    }
}
