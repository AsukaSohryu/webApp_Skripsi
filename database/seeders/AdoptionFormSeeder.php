<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdoptionFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adoption_form')->insert([
            [
                'user_id' => 2,
                'animal_id' => 3,
                'status_id' => 11,
                'is_seen' => 0,
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'user_id' => 1,
                'animal_id' => 3,
                'status_id' => 11,
                'is_seen' => 1,
                'created_at' => '2024-12-01 00:00:00'
            ],
        ]);
    }
}
