<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_configuration')->insert([

            // Form Report
            [
                'config' => 'Form_Report_Status',
                'key' => 'REQ',
                'status' => 'Penyelematkan Diajukan',
            ],
            [
                'config' => 'Form_Report_Status',
                'key' => 'ONP',
                'status' => 'Dalam Proses Penyelematan',
            ],
            [
                'config' => 'Form_Report_Status',
                'key' => 'RSC',
                'status' => 'Hewan Sukses Diselamatkan',
            ],
            [
                'config' => 'Form_Report_Status',
                'key' => 'NFD',
                'status' => 'Hewan Tidak Ditemukan',
            ],
            [
                'config' => 'Form_Report_Status',
                'key' => 'OTH',
                'status' => 'Lainnya',
            ],

            // Form Handover
            [
                'config' => 'Form_Handover_Status',
                'key' => 'REQ',
                'status' => 'Penyerahan Diajukan',
            ],
            [
                'config' => 'Form_Handover_Status',
                'key' => 'APP',
                'status' => 'Pengajuan Penyerahan Disetujui',
            ],
            [
                'config' => 'Form_Handover_Status',
                'key' => 'RJT',
                'status' => 'Pengajuan Penyerahan Ditolak',
            ],
            [
                'config' => 'Form_Handover_Status',
                'key' => 'SUC',
                'status' => 'Penyerahan Berhasil',
            ],
            [
                'config' => 'Form_Handover_Status',
                'key' => 'CAN',
                'status' => 'Penyerahan Dibatalkan',
            ],
            
            //Form Adoption
            [
                'config' => 'Form_Adoption_Status',
                'key' => 'REQ',
                'status' => 'Adopsi Diajukan',
            ],
            [
                'config' => 'Form_Adoption_Status',
                'key' => 'APP',
                'status' => 'Pengajuan Adopsi Disetujui',
            ],
            [
                'config' => 'Form_Adoption_Status',
                'key' => 'RJT',
                'status' => 'Pengajuan Adopsi Ditolak',
            ],
            [
                'config' => 'Form_Adoption_Status',
                'key' => 'SUC',
                'status' => 'Adopsi Berhasil',
            ],
            [
                'config' => 'Form_Adoption_Status',
                'key' => 'CAN',
                'status' => 'Adopsi Dibatalkan',
            ],

            //Animal
            [
                'config' => 'Animal_Status',
                'key' => 'RES',
                'status' => 'Baru Diselamatkan',
            ],
            [
                'config' => 'Animal_Status',
                'key' => 'ONC',
                'status' => 'Dalam Proses Perawatan',
            ],
            [
                'config' => 'Animal_Status',
                'key' => 'AVL',
                'status' => 'Tersedia Untuk Adopsi',
            ],
            [
                'config' => 'Animal_Status',
                'key' => 'NAL',
                'status' => 'Tidak Tersedia Untuk Adopsi',
            ],
            [
                'config' => 'Animal_Status',
                'key' => 'RSV',
                'status' => 'Dalam Proses Adopsi',
            ],
            [
                'config' => 'Animal_Status',
                'key' => 'ADP',
                'status' => 'Telah Diadopsi',
            ],
            [
                'config' => 'Animal_Status',
                'key' => 'RTO',
                'status' => 'Dikembalikan Pada Pemilik',
            ],
        ]);
    }
}
