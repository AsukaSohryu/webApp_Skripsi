<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Status;

class AdoptionFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = status::where('config', 'Form_Adoption_Status')->get();
        $statusREQ = $status->where('key', 'REQ')->first()->status_id ?? null;
        $statusAPP = $status->where('key', 'APP')->first()->status_id ?? null;
        $statusSUC = $status->where('key', 'SUC')->first()->status_id ?? null;

        DB::table('adoption_form')->insert([
            [
                'user_id' => 4,
                'animal_id' => 4,
                'status_id' => $statusREQ,
                'is_seen' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'admin_feedback' => ''
            ],
            [
                'user_id' => 4,
                'animal_id' => 3,
                'status_id' => $statusAPP,
                'is_seen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'admin_feedback' => 'Pengajuan anda kami setujui, silakan cek whatsapp anda untuk melanjutkan percakapan dan proses berikutnya, terima kasih'
            ],
            [
                'user_id' => 4,
                'animal_id' => 9,
                'status_id' => $statusSUC,
                'is_seen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'admin_feedback' => 'Pengajuan Pengadopsian Berhasil, Terima Kasih sudah mengadopsi jack dari kami, kami akan melakukan pengecekan rutin dalam beberapa bulan kedepan'
            ],
        ]);
    }
}
