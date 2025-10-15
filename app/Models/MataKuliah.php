<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable  = [
        'kode_mk',
        'nama_mk',
        'jurusan',
        'sks',
        'dosen_id',
    ];

    protected $table = 'mata_kuliah';

    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa() {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_mata_kuliah', 'mahasiswa_id', 'mata_kuliah_id');
    }
}
