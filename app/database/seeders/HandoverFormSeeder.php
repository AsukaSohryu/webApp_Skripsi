<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Status;

class HandoverFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = status::where('config', 'Form_Handover_Status')->get();
        $statusREQ = $status->where('key', 'REQ')->first()->status_id ?? null;
        $statusRJT = $status->where('key', 'RJT')->first()->status_id ?? null;

        DB::table('handover_form')->insert([
            [
                'user_id' => 4,
                'status_id' => $statusREQ,
                'photo' => '',
                'is_seen' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'admin_feedback' => ''
            ],
            [
                'user_id' => 4,
                'status_id' => $statusRJT,
                'photo' => '',
                'is_seen' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'admin_feedback' => 'Maaf kami harus menolak pengajuan penyerahan anda, hasil evaluasi formulir anda tidak sesuai dengan syarat kami, terima kasih.'
            ],
        ]);
    }
}
