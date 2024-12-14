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
            [ //Nama Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 1,
                'answer' => 'Minnie',
            ],
            [ //Jenis Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 2,
                'answer' => 'Anjing',
            ],
            [ //Umur Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 3,
                'answer' => '12',
            ],
            [ //Tanggal Lahir Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 4,
                'answer' => '2012-01-04',
            ],
            [ //Jenis Kelamin Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 5,
                'answer' => 'Betina',
            ],
            [ //Ras Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 6,
                'answer' => 'Chihuahua',
            ],
            [ //Warna Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 7,
                'answer' => 'Hitam dan Putih',
            ],
            [ //Berat Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 8,
                'answer' => 2,
            ],
            [ //Vaksin Hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 9,
                'answer' => 'DHLPP, Rabies, Bordetella, Influenza Canine, Leptospirosis, Lyme Disease, dan Coronavirus Canine',
            ],
            [ //Is Sterile
                'handover_form_id' => 1,
                'handover_questions_id' => 10,
                'answer' => 1,
            ],
            [ //Tanggal vaksinasi terakhir
                'handover_form_id' => 1,
                'handover_questions_id' => 11,
                'answer' => '2023-05-06',
            ],
            [ //Alasan penyerahan hewan
                'handover_form_id' => 1,
                'handover_questions_id' => 12,
                'answer' => 'Umur saya sudah terlalu tua dan tidak dapat mengurus dengan baik',
            ],
            [ //Makanan yang biasa diberikan? (Makanan Kaleng/Makanan Kering/Nasi + Daging/Lainnya)
                'handover_form_id' => 1,
                'handover_questions_id' => 13,
                'answer' => 'Makanan kaleng, Nasi, dan Daging',
            ],
            [ //Apakah hewan jinak pada anak?
                'handover_form_id' => 1,
                'handover_questions_id' => 14,
                'answer' => 'Iya hewan jinak dan ramah terhadap anak-anak',
            ],
            [ //Apakah hewan menggigit/galak?
                'handover_form_id' => 1,
                'handover_questions_id' => 15,
                'answer' => 'Tidak hewan tidak menggigit/galak',
            ],
            [ //Apakah hewan bisa bergaul dengan anjing/kucing lain?
                'handover_form_id' => 1,
                'handover_questions_id' => 16,
                'answer' => 'Iya hewan bisa bergaul dengan anjing atau kucing lain',
            ],
            [ //Dimanakah hewan biasa tidur? (Didalam/Diluar rumah?)
                'handover_form_id' => 1,
                'handover_questions_id' => 17,
                'answer' => 'Didalam rumah',
            ],
            [ //Apakah hewan biasa berada didalam rumah atau bebas berkeliaran?
                'handover_form_id' => 1,
                'handover_questions_id' => 18,
                'answer' => 'Didalam rumah',
            ],
            [ //Apakah hewan terlatih untuk buang air di kotak pasir?
                'handover_form_id' => 1,
                'handover_questions_id' => 19,
                'answer' => 'Iya hewan terlatih',
            ],
            [ //Adakah sifat/hal lain yang perlu kami ketahui?
                'handover_form_id' => 1,
                'handover_questions_id' => 20,
                'answer' => 'Pemilih makanan, suka bertemu orang baru',
            ],

            // Hewan 2
            [ //Nama Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 1,
                'answer' => 'Keysha (Sha-Sha)',
            ],
            [ //Jenis Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 2,
                'answer' => 'Anjing',
            ],
            [ //Umur Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 3,
                'answer' => '13',
            ],
            [ //Tanggal Lahir Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 4,
                'answer' => '2011-01-04',
            ],
            [ //Jenis Kelamin Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 5,
                'answer' => 'Betina',
            ],
            [ //Ras Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 6,
                'answer' => 'Shitzu',
            ],
            [ //Warna Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 7,
                'answer' => 'Coklat dan Putih',
            ],
            [ //Berat Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 8,
                'answer' => 6,
            ],
            [ //Vaksin Hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 9,
                'answer' => 'DHLPP, Rabies, Bordetella, Influenza Canine, Leptospirosis, Lyme Disease, dan Coronavirus Canine',
            ],
            [ //Is Sterile
                'handover_form_id' => 2,
                'handover_questions_id' => 10,
                'answer' => 1,
            ],
            [ //Tanggal vaksinasi terakhir
                'handover_form_id' => 2,
                'handover_questions_id' => 11,
                'answer' => '2023-05-06',
            ],
            [ //Alasan penyerahan hewan
                'handover_form_id' => 2,
                'handover_questions_id' => 12,
                'answer' => 'Umur saya sudah terlalu tua dan tidak dapat mengurus dengan baik',
            ],
            [ //Makanan yang biasa diberikan? (Makanan Kaleng/Makanan Kering/Nasi + Daging/Lainnya)
                'handover_form_id' => 2,
                'handover_questions_id' => 13,
                'answer' => 'Makanan kaleng, Nasi, dan Daging',
            ],
            [ //Apakah hewan jinak pada anak?
                'handover_form_id' => 2,
                'handover_questions_id' => 14,
                'answer' => 'Iya hewan jinak dan ramah terhadap anak-anak',
            ],
            [ //Apakah hewan menggigit/galak?
                'handover_form_id' => 2,
                'handover_questions_id' => 15,
                'answer' => 'Hewan galak dengan anjing dan kucing lain',
            ],
            [ //Apakah hewan bisa bergaul dengan anjing/kucing lain?
                'handover_form_id' => 2,
                'handover_questions_id' => 16,
                'answer' => 'Tidak hewan tidak bisa bergaul dengan anjing/kucing lain',
            ],
            [ //Dimanakah hewan biasa tidur? (Didalam/Diluar rumah?)
                'handover_form_id' => 2,
                'handover_questions_id' => 17,
                'answer' => 'Didalam rumah',
            ],
            [ //Apakah hewan biasa berada didalam rumah atau bebas berkeliaran?
                'handover_form_id' => 2,
                'handover_questions_id' => 18,
                'answer' => 'Didalam rumah',
            ],
            [ //Apakah hewan terlatih untuk buang air di kotak pasir?
                'handover_form_id' => 2,
                'handover_questions_id' => 19,
                'answer' => 'Iya hewan terlatih',
            ],
            [ //Adakah sifat/hal lain yang perlu kami ketahui?
                'handover_form_id' => 2,
                'handover_questions_id' => 20,
                'answer' => 'Hewan memiliki sifat pemalas, penyendiri, dan rakus terhadap makanan',
            ],
        ]);
    }
}
