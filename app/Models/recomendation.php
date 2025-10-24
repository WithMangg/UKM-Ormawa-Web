<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\About;

class recomendation extends Model // r kecil
{
    use HasFactory;

    protected $table = 'recomendation';

    protected $fillable = [
        'Adminukm_id',
        'nama',
        'question1',
        'JK',
        'question2',
        'question3',
        'question4',
        'question5',
        'question6',
        'question7',
        'question8',
        'question9',
    ];

    public function Adminukm()
    {
        return $this->belongsTo(User::class, 'Adminukm_id');
    }

    public function about()
    {
        return $this->belongsTo(About::class, 'Adminukm_id', 'user_id');
    }
}
