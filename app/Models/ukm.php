<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    protected $table = 'ukm'; // Nama tabel

    protected $fillable = [
        'name',
        'logo',
        'slug',
        'about',
        'batas_pendaftaran',
        'Adminukm_id', // Pastikan ini benar
    ];

    public function Adminukm()
    {
        return $this->belongsTo(User::class, 'Adminukm_id');
    }
}

