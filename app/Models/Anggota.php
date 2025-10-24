<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'daftar_anggota'; // Nama tabel

    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'tahun_masuk',
        'anggota_id', // Pastikan ini benar
    ];

    public function anggotaId()
    {
        return $this->belongsTo(User::class, 'anggota_id');
    }
}
