<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            [
                'kode_mk' => 'STI-001',
                'nama_mk' => 'Algoritma Pemrograman',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'sks' => 3,
                'dosen_id' => 1,
            ],
            [
                'kode_mk' => 'BD-001',
                'nama_mk' => 'Marketing',
                'jurusan' => 'Bisnis Digital',
                'sks' => 3,
                'dosen_id' => 2,
            ],
            [
                'kode_mk' => 'KWU-001',
                'nama_mk' => 'Accounting',
                'jurusan' => 'Kewirausahaan',
                'sks' => 3,
                'dosen_id' => 3,
            ],
            [
                'kode_mk' => 'STI-002',
                'nama_mk' => 'Web Dasar',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'sks' => 3,
                'dosen_id' => 1,
            ],
            [
                'kode_mk' => 'BD-002',
                'nama_mk' => 'Manajemen Bisnis',
                'jurusan' => 'Bisnis Digital',
                'sks' => 3,
                'dosen_id' => 2,
            ],
            [
                'kode_mk' => 'KWU-002',
                'nama_mk' => 'Metodologi Penelitian',
                'jurusan' => 'Kewirausahaan',
                'sks' => 3,
                'dosen_id' => 3,
            ],
            [
                'kode_mk' => 'STI-003',
                'nama_mk' => 'Struktur Data',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'sks' => 3,
                'dosen_id' => 1,
            ],
            [
                'kode_mk' => 'BD-003',
                'nama_mk' => 'Matematika Bisnis',
                'jurusan' => 'Bisnis Digital',
                'sks' => 3,
                'dosen_id' => 2,
            ],
            [
                'kode_mk' => 'KWU-003',
                'nama_mk' => 'Ekonomi Mikro & Makro',
                'jurusan' => 'Kewirausahaan',
                'sks' => 3,
                'dosen_id' => 3,
            ],
            [
                'kode_mk' => 'STI-004',
                'nama_mk' => 'Matematika Diskrit',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'sks' => 3,
                'dosen_id' => 1,
            ],
        ]);
    }
}
