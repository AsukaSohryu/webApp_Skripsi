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
                'animal_type' => 'Kucing',
                'age' => 1,
                'birth_date' => '2024-10-01',
                'sex' => 'Betina',
                'race' => 'Kucing Kampung',
                'color' => 'putih',
                'weight' => 2,
                'vaccine' => ' FVRCP, rabies, dan FeLV',
                'is_sterile' => 1,
                'is_active' => 1,
                'source' => 'Diserahkan orang dalam box',
                'characteristics' => 'Kocheng sangat manja dan suka dielus-elus',
                'description' => 'Kocheng merupakan kucing yang lucu dan memiliki kemampuan tinggi. Sangat cocok untuk dijual ke orang yang ingin mencari kucing yang tinggi.',
                'medical_note' => 'Kucing ini tidak memiliki riwayat penyakit',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'status_id' => 17,
                'animal_name' => 'Blackie',
                'animal_type' => 'Kucing',
                'age' => 2,
                'birth_date' => '2023-09-15',
                'sex' => 'Betina',
                'race' => 'Kucing Kampung',
                'color' => 'Hitam',
                'weight' => 3,
                'vaccine' => 'FVRCP, rabies',
                'is_sterile' => 1,
                'is_active' => 1,
                'source' => 'Ditemukan di jalan',
                'characteristics' => 'Blackie sangat ramah dan suka bermain dengan anak-anak',
                'description' => 'Blackie adalah kucing yang ceria dan penuh energi. Dia sangat cocok untuk keluarga yang aktif.',
                'medical_note' => 'Blackie telah divaksin dan tidak memiliki riwayat penyakit',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'status_id' => 18,
                'animal_name' => 'Milky',
                'animal_type' => 'Kucing',
                'age' => 3,
                'birth_date' => '2021-05-20',
                'sex' => 'Jantan',
                'race' => 'Kucing Kampung',
                'color' => 'Putih dengan sedikit corak hitam',
                'weight' => 4.5,
                'vaccine' => 'FVRCP, rabies, dan FeLV',
                'is_sterile' => 1,
                'is_active' => 1,
                'source' => 'Diselamatkan disekitar shelter',
                'characteristics' => 'Suka menjahili hewan lain, terkadang aktif, terkadang pendiam',
                'description' => 'Milky adalah kucing yang sangat penuh energi. Dia sangat cocok untuk keluarga yang aktif.',
                'medical_note' => 'Milky dalam kondisi sehat dan telah menjalani pemeriksaan rutin',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
            [
                'status_id' => 19,
                'animal_name' => 'MaoMao',
                'animal_type' => 'Kucing',
                'age' => 8,
                'birth_date' => '2016-03-10',
                'sex' => 'Betina',
                'race' => 'Kucing Kampung',
                'color' => 'Hitam kecoklatan dan putih',
                'weight' => 8,
                'vaccine' => 'FVRCP, rabies',
                'is_sterile' => 1,
                'is_active' => 1,
                'source' => 'Diserahkan pemilik yang lama',
                'characteristics' => 'MaoMao sangat tenang dan suka berjemur di bawah sinar matahari',
                'description' => 'MaoMao adalah kucing yang anggun dan penuh kasih. Dia sangat cocok untuk pemilik yang mencari kucing yang santai.',
                'medical_note' => 'MaoMao tidak memiliki riwayat penyakit dan telah divaksin lengkap',
                'photo' => '',
                'created_at' => '2024-12-01 00:00:00'
            ],
        ]);
    }
}
