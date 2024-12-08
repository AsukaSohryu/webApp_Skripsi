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
            [
                'status_id' => 16,
                'animal_name' => 'Kocheng',
                'animal_type' => 'kucing',
                'age' => 1,
                'birth_date' => '2024-10-01',
                'sex' => 'Betina',
                'race' => 'Persian',
                'color' => 'putih',
                'weight' => 2,
                'vaccine' => ' FVRCP, rabies, dan FeLV',
                'is_sterile' => 1,
                'is_active' => 1,
                'source' => 'Entah dari mana',
                'characteristics' => 'Kocheng sangat manja dan suka dielus-elus',
                'description' => 'Kocheng merupakan kucing yang lucu dan memiliki kemampuan tinggi. Sangat cocok untuk dijual ke orang yang ingin mencari kucing yang tinggi.',
                'medical_note' => 'Kucing ini tidak memiliki riwayat penyakit',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'status_id' => 17,
                'animal_name' => 'Mimi',
                'animal_type' => 'kucing',
                'age' => 2,
                'birth_date' => '2023-09-15',
                'sex' => 'Betina',
                'race' => 'Siamese',
                'color' => 'Coklat',
                'weight' => 3,
                'vaccine' => 'FVRCP, rabies',
                'is_sterile' => 1,
                'is_active' => 1,
                'source' => 'Ditemukan di jalan',
                'characteristics' => 'Mimi sangat ramah dan suka bermain dengan anak-anak',
                'description' => 'Mimi adalah kucing yang ceria dan penuh energi. Dia sangat cocok untuk keluarga yang aktif.',
                'medical_note' => 'Mimi telah divaksin dan tidak memiliki riwayat penyakit',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'status_id' => 18,
                'animal_name' => 'Tommy',
                'animal_type' => 'kucing',
                'age' => 3,
                'birth_date' => '2022-05-20',
                'sex' => 'Jantan',
                'race' => 'Maine Coon',
                'color' => 'Abu-abu',
                'weight' => 5,
                'vaccine' => 'FVRCP, rabies, dan FeLV',
                'is_sterile' => 0,
                'is_active' => 1,
                'source' => 'Diserahkan oleh pemilik',
                'characteristics' => 'Tommy sangat penyayang dan suka berinteraksi dengan manusia',
                'description' => 'Tommy adalah kucing besar yang sangat lembut dan penuh kasih sayang. Dia akan menjadi teman yang setia.',
                'medical_note' => 'Tommy dalam kondisi sehat dan telah menjalani pemeriksaan rutin',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'status_id' => 19,
                'animal_name' => 'Luna',
                'animal_type' => 'kucing',
                'age' => 4,
                'birth_date' => '2021-03-10',
                'sex' => 'Betina',
                'race' => 'British Shorthair',
                'color' => 'Perak',
                'weight' => 4,
                'vaccine' => 'FVRCP, rabies',
                'is_sterile' => 1,
                'is_active' => 1,
                'source' => 'Ditemukan di taman',
                'characteristics' => 'Luna sangat tenang dan suka berjemur di bawah sinar matahari',
                'description' => 'Luna adalah kucing yang anggun dan penuh kasih. Dia sangat cocok untuk pemilik yang mencari kucing yang santai.',
                'medical_note' => 'Luna tidak memiliki riwayat penyakit dan telah divaksin lengkap',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
        ]);
    }
}
