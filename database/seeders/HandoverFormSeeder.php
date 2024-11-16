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
            'user_id' => 1,
            'status_id' => 6,
            'photo' => '',
            'is_seen' => 0,
        ]);
    }
}
