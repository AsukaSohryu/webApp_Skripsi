<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'shelter_id' => 1,
                'name' => 'Steven Cokro',
                'email' => 'stevencokro32@gmail.com',
                'password' => '$2y$10$OiiOR0sWJmle32E6tf/ld.UZZXocd2TjrMq540oQC0zKZgujqCh5q',
                'address' => 'Jl Kemakmuran Blok A Nomor 15',
                'job' => 'Mahasiswa',
                'birth_date' => '2002-01-20',
                'whatsapp_number' => '087889360769',
                'phone_number' => '087889360769',
                'photo' => '',
                'role' => 'Admin',
                // 'otp' => '',
            ],
            [
                'shelter_id' => 1,
                'name' => 'Alexander Subroto',
                'email' => 'alexander.sub168@gmail.com',
                'password' => '$2y$10$OiiOR0sWJmle32E6tf/ld.UZZXocd2TjrMq540oQC0zKZgujqCh5q',
                'address' => 'Jl Keutamaan No 32 Krukut, Jakarta Barat, Kecamatan Tamansari.',
                'job' => 'Wirausahawan',
                'birth_date' => '1995-03-01',
                'whatsapp_number' => '085718883668',
                'phone_number' => '085718883668',
                'photo' => '',
                'role' => 'Admin',
                // 'otp' => '',
            ],
            [
                'shelter_id' => 1,
                'name' => 'Samuel Michael',
                'email' => 'sam.michael26@gmail.com',
                'password' => '$2y$10$OiiOR0sWJmle32E6tf/ld.UZZXocd2TjrMq540oQC0zKZgujqCh5q',
                'address' => 'Jl Ganda Citra Putra Blok C Nomor 3A',
                'job' => 'Karyawan Swasta',
                'birth_date' => '1994-01-20',
                'whatsapp_number' => '081384079334',
                'phone_number' => '081384079334',
                'photo' => '',
                'role' => 'Admin',
                // 'otp' => '',
            ],
            [
                'shelter_id' => 1,
                'name' => 'Diana Putri',
                'email' => 'diana.putri@gmail.com',
                'password' => 'password123',
                'address' => 'Jl. Melati No. 10, Jakarta',
                'job' => 'Guru',
                'birth_date' => '1988-05-15',
                'whatsapp_number' => '082112345678',
                'phone_number' => '082112345678',
                'photo' => '',
                'role' => 'User ',
                // 'otp' => '',
            ],
            [
                'shelter_id' => 1,
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'password' => 'password123',
                'address' => 'Jl. Raya No. 45, Bandung',
                'job' => 'Pengusaha',
                'birth_date' => '1992-09-30',
                'whatsapp_number' => '081234567890',
                'phone_number' => '081234567890',
                'photo' => '',
                'role' => 'User ',
                // 'otp' => '',
            ],
            [
                'shelter_id' => 1,
                'name' => 'Siti Rahmawati',
                'email' => 'siti.rahmawati@gmail.com',
                'password' => 'password123',
                'address' => 'Jl. Anggrek No. 25, Yogyakarta',
                'job' => 'Mahasiswa',
                'birth_date' => '2000-12-05',
                'whatsapp_number' => '085678912345',
                'phone_number' => '085678912345',
                'photo' => '',
                'role' => 'User ',
                // 'otp' => '',
            ],
        ]);
    }
}
