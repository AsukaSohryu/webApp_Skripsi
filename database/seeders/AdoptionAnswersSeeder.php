<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdoptionAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adoption_answers')->insert([
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 1,
                'answer' => 'Ya saya bersedia berkomitmen',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 2,
                'answer' => 'Ya, saat ini saya memlihara 1 ekor kucing',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 3,
                'answer' => 'Jenis apa saja saya tertarik',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 4,
                'answer' => 'Saya ingin menambah satu ekor kucing untuk teman kucing saya?',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 5,
                'answer' => 'Tidak saya tidak memiliki anak',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 6,
                'answer' => 'Ya seluruh penghuni rumah saya setuju',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 7,
                'answer' => 'Tidak ada yang alergi',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 8,
                'answer' => 'Tinggal bebas didalam rumah',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 9,
                'answer' => 'Tidak terlalu luas',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 10,
                'answer' => 'Ya memiliki pagar yang kuat',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 11,
                'answer' => 'Tidak, saya akan membiarkan satwa secara lepas di area rumah',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 12,
                'answer' => 'Didalam rumah',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 13,
                'answer' => 'Akan Tidur didalam ruangan yang saya sediakan',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 14,
                'answer' => 'Saya akan mencari solusi terbaik untuk menyembuhkan hewan peliharaan saya',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 15,
                'answer' => 'Membawa ke dokter hewan untuk mencari tahu penyebab',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 16,
                'answer' => 'Ya saya tahu dan saya bersedia untuk mengeluarkan biaya',
            ],
            [
                'adoption_form_id' => 1,
                'adoption_questions_id' => 17,
                'answer' => 'Saya akan menitipkan hewan peliharaan saya kepada kerabat, jika tidak ada yang bisa, saya akan mencari jasa penitipan hewan yang terjamin',
            ],
        ]);
    }
}
