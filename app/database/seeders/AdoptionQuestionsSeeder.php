<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdoptionQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adoption_questions')->insert([
            [
                'questions' => 'Apakah anda bersedia membuat komitmen dengan satwa anda selama hidupnya (mungkin 10-20 tahun) dalam keadaan sehat maupun sakit?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah anda saat ini atau sebelumnya pernah memelihara satwa? Bila ya, berapa ekor anjing/kucing yang dimiliki sekarang?',
                'is_active' => 1
            ],
            [
                'questions' => 'Anda tertarik untuk mengadopsi anjing/kucing jenis apa?',
                'is_active' => 1
            ],
            [
                'questions' => 'Mengapa anda ingin memiliki hewan peliharaan?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah anda memiliki anak?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah seluruh penghuni rumah anda, setuju untuk mengadopsi dan memelihara anjing/kucing?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah ada penghuni rumah yang alergi terhadap satwa?',
                'is_active' => 1
            ],
            [
                'questions' => 'Dimanakah tempat tinggal anda (di mana satwa yang akan diadopsi akan ditempatkan)?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah rumah anda memiliki halaman yang luas?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah rumah anda memiliki pagar yang kuat?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah anda berencana untuk mengikat atau memasukkan satwa dalam kandang?',
                'is_active' => 1
            ],
            [
                'questions' => 'Pada malam hari, dimanakah satwa anda ditempatkan?',
                'is_active' => 1
            ],
            [
                'questions' => 'Dimana satwa anda tidur?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah yang anda lakukan bila satwa anda sakit dan biaya pengobatan cukup tinggi?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apa yang akan anda lakukan bila tiba-tiba tingkah laku satwa anda berubah (murung, sakit, agresif)?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah anda tahu bahwa satwa anda akan memerlukan biaya ekstra, seperti untuk makanan hewan, vaksinasi tahunan, obat cacing, obat kutu dll.?',
                'is_active' => 1
            ],
            [
                'questions' => 'Apakah yang anda lakukan terhadap satwa anda bila anda harus pindah keluar kota atau keluar negeri?',
                'is_active' => 1
            ],
        ]);
    }
}