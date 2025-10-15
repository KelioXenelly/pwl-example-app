<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            [
                'nama' => 'Eric Prakarsa Putra',
                'nip' => '2001',
                'pendidikan_terakhir' => 'Strata 2',
                'jurusan' => 'Teknik Informatika',
            ],
            [
                'nama' => 'William Wendy Ary',
                'nip' => '2002',
                'pendidikan_terakhir' => 'Strata 2',
                'jurusan' => 'Manajemen Internasional'
            ],
            [
                'nama' => 'Ratna Lang',
                'nip' => '2003',
                'pendidikan_terakhir' => 'Strata 2',
                'jurusan' => 'Accounting'
            ],
        ]);
    }
}
