<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'NIM' => '2021001',
                'name' => 'Andi Wijaya',
                'tempat_lahir' => 'Pontianak',
                'tanggal_lahir' => '2003-01-15',
                'jurusan' => 'Bisnis Digital',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021002',
                'name' => 'Budi Santoso',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2002-11-20',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021003',
                'name' => 'Citra Dewi',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2003-05-10',
                'jurusan' => 'Kewirausahaan',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021004',
                'name' => 'Dedi Pratama',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2002-09-05',
                'jurusan' => 'Bisnis Digital',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021005',
                'name' => 'Eka Sari',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2003-02-22',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021006',
                'name' => 'Fajar Nugroho',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '2002-07-30',
                'jurusan' => 'Kewirausahaan',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021007',
                'name' => 'Gita Lestari',
                'tempat_lahir' => 'Makassar',
                'tanggal_lahir' => '2003-03-12',
                'jurusan' => 'Bisnis Digital',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021008',
                'name' => 'Hendra Gunawan',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '2002-06-18',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021009',
                'name' => 'Intan Permata',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2003-04-25',
                'jurusan' => 'Kewirausahaan',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
            [
                'NIM' => '2021010',
                'name' => 'Joko Susilo',
                'tempat_lahir' => 'Balikpapan',
                'tanggal_lahir' => '2002-08-08',
                'jurusan' => 'Bisnis Digital',
                'max_sks' => 24,
                'angkatan' => 2021,
            ],
        ]);
    }
}
