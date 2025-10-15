<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable  = [
        'NIM',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'max_sks',
        'angkatan'
    ];

    protected $table = 'mahasiswa';

    public function mata_kuliah() {
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_mata_kuliah', 'mahasiswa_id', 'mata_kuliah_id');
    }
}
