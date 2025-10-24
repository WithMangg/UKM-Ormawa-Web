<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment extends Model
{
    use HasFactory;

    protected $table = 'recruitment'; // Pastikan nama tabel sesuai dengan database

    protected $fillable = [
        'name',
        'nim',
        'email',
        'phone',
        'study_program',
        'semester',
        // 'bersedia',
        'gender',
        'reason',
        'photo',
        'created_at',
        'Adminukm_id', // isi tabel 
    ];

    public function Adminukm()
    {
        return $this->belongsTo(User::class, 'Adminukm_id');
    }
}
