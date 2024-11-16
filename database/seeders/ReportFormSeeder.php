<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('report_form')->insert([
            'user_id' => 3,
            'status_id' => 1,
            'animal_type' => 'Anjing',
            'location' => 'Jakarta Selatan dekat Mc Donald',
            'location_map' => 'https://www.google.com/maps/search/?api=1&query=-6.2500,106.845',
            'photo' => '',
            'description' => 'Anjing ditemukan dekat tempat sampah Mc Donald',
            'is_seen' => 0,
        ]);
    }
}
