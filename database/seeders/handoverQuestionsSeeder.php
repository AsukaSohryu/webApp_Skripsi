<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HandoverQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('handover_questions')->insert([
            [
                'questions' => 'Nama Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Jenis Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Umur Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Tanggal Lahir Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Jenis Kelamin Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Ras Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Warna Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Berat Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Vaksin Hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah hewan sudah steril?',
                'is_active' => 1
            ],
            [
                'questions' => 'Tanggal vaksinasi terakhir',
                'is_active' => 1
            ],
            [
                'questions' => 'Alasan penyerahan hewan',
                'is_active' => 1
            ],
            [
                'questions' => 'Makanan yang biasa diberikan? (Makanan Kaleng/Makanan Kering/Nasi + Daging/Lainnya)',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah hewan jinak pada anak?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah hewan menggigit/galak?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah hewan bisa bergaul dengan anjing/kucing lain?',
                'is_active' => 1
            ],
            [
                'questions' => 'Dimanakah hewan biasa tidur? (Didalam/Diluar rumah?)',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah hewan biasa berada didalam rumah atau bebas berkeliaran?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah hewan terlatih untuk buang air di kotak pasir?',
                'is_active' => 1
            ],
            [
                'questions' => 'Adakah sifat/hal lain yang perlu kami ketahui?',
                'is_active' => 1
            ],
        ]);
    }
}
