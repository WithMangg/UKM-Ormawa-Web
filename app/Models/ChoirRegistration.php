<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoirRegistration extends Model
{
    use HasFactory;

    protected $table = 'registrations'; // Pastikan nama tabel sesuai dengan database

    protected $fillable = [
        'name',
        'nim',
        'email',
        'phone',
        'study_program',
        'entry_year',
        'gender',
        'reason',
        'photo',
        'Adminukm_id', // Pastikan ini benar
    ];

    public function Adminukm()
    {
        return $this->belongsTo(User::class, 'Adminukm_id');
    }
}
