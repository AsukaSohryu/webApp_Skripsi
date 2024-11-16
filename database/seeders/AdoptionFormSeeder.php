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
            'user_id' => 2,
            'animal_id' => 3,
            'status_id' => 11,
            'is_seen' => 0,
        ]);
    }
}
