<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HandoverAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('handover_answers')->insert([
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 1,
                'answer' => 'Choco', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 2,
                'answer' => 'Anjing', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 3,
                'answer' => '7', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 4,
                'answer' => '2017-01-04', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 5,
                'answer' => 'Jantan', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 6,
                'answer' => 'Chihuahua', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 7,
                'answer' => 'Coklat Kehitaman', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 8,
                'answer' => '3 kg', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 9,
                'answer' => 'DHLPP, Rabies, Bordetella, Influenza Canine, Leptospirosis, Lyme Disease, dan Coronavirus Canine', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 10,
                'answer' => 'Iya', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 11,
                'answer' => '2023-05-06', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 12,
                'answer' => 'Umur saya sudah terlalu tua dan tidak dapat mengurus dengan baik', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 13,
                'answer' => 'Makanan kaleng, Nasi, dan Daging', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 14,
                'answer' => 'Tidak', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 15,
                'answer' => 'Iya', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 16,
                'answer' => 'Iya', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 17,
                'answer' => 'Didalam', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 18,
                'answer' => 'Didalam', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 19,
                'answer' => 'Iya', 
            ],
            [
                'handover_form_id' => 1,
                'handover_questions_id' => 20,
                'answer' => 'Choco tidak suka dijahili secara terus menerus, dapat menjadi sangat galak', 
            ],
        ]);
    }
}