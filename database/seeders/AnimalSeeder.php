<?php

namespace Database\Seeders;

use App\Models\animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animal')->insert([
            'status_id' => 16,
            'animal_name' => 'Kocheng',
            'animal_type' => 'kucing',
            'age' => 1,
            'birth_date' => '2024-10-01',
            'sex' => 'perempuan',
            'race' => 'Persian',
            'color' => 'putih',
            'weight' => 2,
            'vaccine' => '',
            'is_sterile' => 1,
            'is_active' => 1,
            'source' => 'Entah dari mana',
            'characteristics' => 'Lucu',
            'description' => 'Kocheng merupakan kucing yang lucu dan memiliki kemampuan tinggi. Sangat cocok untuk dijual ke orang yang ingin mencari kucing yang tinggi.',
            'medical_note' => '',
            'photo' => ''
        ]);
    }
}
