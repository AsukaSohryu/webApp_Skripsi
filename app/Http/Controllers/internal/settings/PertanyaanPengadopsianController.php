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

        // $adoptionQuestions = adoptionQuestions::all();
        // Fetch questions and check if they are used in any form
        $adoptionQuestions = AdoptionQuestions::all()->map(function ($question) {
            $question->used_in_form = $question->adoptionForm()->count() > 0;
            return $question;
        });

        return view('internal.content.settings.adoptionQuestions.edit', [
            'title' => 'Edit Pertanyaan Pengadopsian',
            'pageTitle' => 'Konfigurasi Pertanyaan Pengadopsian',
            'pageSubTitle' => 'Perubahan Daftar Pertanyaan Formulir Pengadopsian Hewan',
            'adoptionQuestions' => $adoptionQuestions,
        ]);
    }

    // public function editPost(Request $request){
    //     try {
    //         // Handle existing questions status updates
    //         $activeStatus = $request->input('activeStatus', []);
    //         if (!empty($activeStatus)) {
    //             foreach ($activeStatus as $questionId => $status) {
    //                 AdoptionQuestions::where('adoption_question_id', $questionId)
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
                        
    //                     AdoptionQuestions::create([
    //                         'questions' => $question,
    //                         'is_active' => $isActive ? 1 : 0
    //                     ]);
    //                 }
    //             }
    //         }

    //         return redirect()
    //             ->route('pertanyaanPengadopsian.index')
    //             ->with('success', 'Pertanyaan pengadopsian berhasil diperbarui');
                
    //     } catch (\Exception $e) {
    //         return redirect()
    //             ->back()
    //             ->with('error', 'Gagal memperbarui pertanyaan pengadopsian: ' . $e->getMessage());
    //     }
    // }

    // public function editPost(Request $request){

    //     try {
    //         // Handle deletion of selected questions
    //         $deleteQuestions = $request->input('deleteQuestions', []);
    //         if (!empty($deleteQuestions)) {
    //             $delete = AdoptionQuestions::whereIn('adoption_question_id', $deleteQuestions)
    //                 ->delete();
    //         }

    //         // Handle existing questions status updates
    //         $activeStatus = $request->input('activeStatus', []);
    //         if (!empty($activeStatus)) {
    //             foreach ($activeStatus as $questionId => $status) {
    //                 $update = AdoptionQuestions::where('adoption_question_id', $questionId)
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
                        
    //                     $new = AdoptionQuestions::create([
    //                         'questions' => $question,
    //                         'is_active' => $isActive ? 1 : 0
    //                     ]);
    //                 }
    //             }
    //         }

    //         if($delete){
    //             // Redirect with success message
    //             return redirect()
    //                 ->route('pertanyaanPengadopsian.edit')
    //                 ->with('success', 'Pertanyaan pengadopsian berhasil dihapus');
    //         }
    //         else if($update){
    //             // Redirect with success message
    //             return redirect()
    //                 ->route('pertanyaanPengadopsian.edit')
    //                 ->with('success', 'Status pertanyaan pengadopsian berhasil diperbarui');
    //         }
    //         else if($new){
    //             // Redirect with success message
    //             return redirect()
    //                 ->route('pertanyaanPengadopsian.edit')
    //                 ->with('success', 'Pertanyaan pengadopsian berhasil ditambahkan');
    //         }
            

    //     } catch (\Exception $e) {
    //         // Handle errors and provide feedback
    //         return redirect()
    //             ->back()
    //             ->with('error', 'Gagal memperbarui pertanyaan pengadopsian: ' . $e->getMessage());
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
                $deleted = AdoptionQuestions::whereIn('adoption_question_id', $deleteQuestions)->delete();
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
                    AdoptionQuestions::where('adoption_question_id', $questionId)
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
                        
                        AdoptionQuestions::create([
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
                    ->route('pertanyaanPengadopsian.edit')
                    ->with('swal_type', $messageType)
                    ->with('swal_message', $message);
            }

            // If no action was taken, return with an info message
            return redirect()
                ->route('pertanyaanPengadopsian.edit')
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

    // public function deleteQuestion($adoption_question_id)
    // {
    //     $question = adoptionQuestions::findOrFail($adoption_question_id);

    //     // dd($question->adoptionForm()->count());

    //     // Check if the question has any related answers
    //     if ($question->adoptionForm()->count() == 0) {
    //         // If there are no related answers, delete the question
    //         $question->delete();
    //         return redirect()->route('pertanyaanPengadopsian.index')->with('success', 'Pertanyaan Berhasil Dihapus');
    //     } else {
    //         // dd('tes');
    //         return redirect()->route('pertanyaanPengadopsian.index')->with('error', 'Pertanyaan Digunakan di Formulir Pengadopsian');
    //     }
    // }
}