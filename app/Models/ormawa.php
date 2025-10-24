<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ormawa extends Model
{
    use HasFactory;

    protected $table = 'ormawa'; // Nama tabel

    protected $fillable = [
        'name',
        'logo',
        'slug',
        'about',
        'batas_pendaftaran',
        'AdminOrmawa_id', // Pastikan ini benar
    ];

    public function AdminOrmawa()
    {
        return $this->belongsTo(User::class, 'AdminOrmawa_id');
    }
}