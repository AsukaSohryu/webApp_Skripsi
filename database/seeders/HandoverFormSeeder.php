<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HandoverFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('handover_form')->insert([
            [
                'user_id' => 1,
                'status_id' => 6,
                'photo' => '',
                'is_seen' => 0,
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'user_id' => 2,
                'status_id' => 6,
                'photo' => '',
                'is_seen' => 0,
                'created_at' => '2024-12-02 01:01:01'
            ],
        ]);
    }
}
