<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class handoverQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('handover_questions')->insert([
        [
            'questions'=>'Nama Hewan', 
            'is_active'=> 1
        ],
        [
            'questions'=>'Jenis Hewan', 
            'is_active'=> 1
        ]
        ]);
    }
}
