<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nisn',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'email',
        'no_telepon',
        'asal_sekolah',
        'jurusan_pilihan',
    ];
}
