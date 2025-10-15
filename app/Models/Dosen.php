<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'pendidikan_terakhir',
        'jurusan',
    ];

    protected $table = 'dosen';

    public function mata_kuliah() {
        return $this->hasMany(MataKuliah::class);
    }
}
