<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\recomendation; // pakai r kecil biar konsisten

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'user_id',
        'nama_organisasi',
        'logo',
        'slogan',
        'tentang_kami',
        'email',
        'nomer_telepon',
        'lokasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rekomendasi()
    {
        return $this->hasOne(recomendation::class, 'Adminukm_id', 'user_id');
    }
}
