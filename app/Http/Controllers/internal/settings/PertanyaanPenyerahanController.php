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

        // $handoverQuestions = handoverQuestions::all();
        $handoverQuestions = handoverQuestions::all()->map(function ($question) {
            $question->used_in_form = $question->handoverForm()->count() > 0;
            return $question;
        });

        return view('internal.content.settings.handoverQuestions.edit', [
            'title' => 'Edit Pertanyaan Penyerahan',
            'pageTitle' => 'Konfigurasi Pertanyaan Penyerahan',
            'pageSubTitle' => 'Perubahan Daftar Pertanyaan Formulir Penyerahan Hewan',
            'handoverQuestions' => $handoverQuestions,
        ]);
    }

    // public function editPost(Request $request){
    //     try {
    //         // Handle existing questions status updates
    //         $activeStatus = $request->input('activeStatus', []);
    //         if (!empty($activeStatus)) {
    //             foreach ($activeStatus as $questionId => $status) {
    //                 handoverQuestions::where('handover_questions_id', $questionId)
    //                     ->update([
    //                         'is_active' => $status === "on" ? 1 : 0
    //                     ]);
    //             }
    //         }

    //         // Handle new questions
    //         $newQuestions = $request->input('new_questions', []);
    //         $newActiveStatus = $request->input('new_activeStatus', []);

    //         if (!empty($newQuestions)) {
    //             foreach ($newQuestions as $index => $question) {
    //                 if (!empty($question)) {
    //                     $isActive = isset($newActiveStatus[$index]) && $newActiveStatus[$index] == "1";
                        
    //                     HandoverQuestions::create([
    //                         'questions' => $question,
    //                         'is_active' => $isActive ? 1 : 0
    //                     ]);
    //                 }
    //             }
    //         }
    //         return redirect()
    //             ->route('pertanyaanPenyerahan.index')
    //             ->with('success', 'Pertanyaan penyerahan berhasil diperbarui');
                
    //     } catch (\Exception $e) {
    //         return redirect()
    //             ->back()
    //             ->with('error', 'Gagal memperbarui pertanyaan penyerahan: ' . $e->getMessage());
    //     }
    // }

        public function editPost(Request $request){

        try {
            // Initialize flag to track which action was taken
            $actionTaken = false;
            $messageType = '';
            $message = '';

            // Handle deletion of selected questions
            $deleteQuestions = $request->input('deleteQuestions', []);
            if (!empty($deleteQuestions)) {
                $deleted = handoverQuestions::whereIn('handover_questions_id', $deleteQuestions)->delete();
                if ($deleted) {
                    $actionTaken = true;
                    $messageType = 'success';
                    $message = 'Pertanyaan berhasil diperbarui!';
                }
            }

            // Handle existing questions status updates
            $activeStatus = $request->input('activeStatus', []);
            if (!empty($activeStatus)) {
                foreach ($activeStatus as $questionId => $status) {
                    handoverQuestions::where('handover_questions_id', $questionId)
                        ->update([
                            'is_active' => $status === "on" ? 1 : 0
                        ]);
                }
                $actionTaken = true;
                $messageType = 'success';
                $message = 'Pertanyaan berhasil diperbarui!';
            }

            // Handle new questions
            $newQuestions = $request->input('new_questions', []);
            $newActiveStatus = $request->input('new_activeStatus', []);
            if (!empty($newQuestions)) {
                foreach ($newQuestions as $index => $question) {
                    if (!empty($question)) {
                        $isActive = isset($newActiveStatus[$index]) && $newActiveStatus[$index] == "1";
                        
                        handoverQuestions::create([
                            'questions' => $question,
                            'is_active' => $isActive ? 1 : 0
                        ]);
                    }
                }
                $actionTaken = true;
                $messageType = 'success';
                $message = 'Pertanyaan baru berhasil ditambahkan!';
            }

            // Check if any action was taken and return appropriate redirect
            if ($actionTaken) {
                return redirect()
                    ->route('pertanyaanPenyerahan.edit')
                    ->with('swal_type', $messageType)
                    ->with('swal_message', $message);
            }

            // If no action was taken, return with an info message
            return redirect()
                ->route('pertanyaanPenyerahan.edit')
                ->with('swal_type', 'info')
                ->with('swal_message', 'Tidak ada perubahan yang dilakukan.');

        } catch (\Exception $e) {
            // Handle errors and provide feedback
            return redirect()
                ->back()
                ->with('swal_type', 'error')
                ->with('swal_message', 'Gagal memperbarui pertanyaan pengadopsian: ' . $e->getMessage());
        }
    }

    // public function deleteQuestion($handover_questions_id)
    // {
    //     $question = handoverQuestions::findOrFail($handover_questions_id);

    //     // dd($question->adoptionForm()->count());

    //     // Check if the question has any related answers
    //     if ($question->handoverForm()->count() == 0) {
    //         // If there are no related answers, delete the question
    //         $question->delete();
    //         return redirect()->route('pertanyaanPengadopsian.index')->with('success', 'Pertanyaan Berhasil Dihapus');
    //     } else {
    //         // dd('tes');
    //         return redirect()->route('pertanyaanPengadopsian.index')->with('error', 'Pertanyaan Digunakan di Formulir Penyerahan');
    //     }
    // }
}
