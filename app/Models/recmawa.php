<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recmawa extends Model
{
    use HasFactory;

    protected $table = 'recmawa'; // Pastikan nama tabel sesuai dengan database

    protected $fillable = [
        'name',
        'nim',
        'email',
        'phone',
        'study_program',
        'semester',
        'gender',
        'reason',
        'photo',
        'AdminOrmawa_id', // Pastikan ini benar
    ];

    public function AdminOrmawa()
    {
        return $this->belongsTo(User::class, 'AdminOrmawa_id');
    }
}
