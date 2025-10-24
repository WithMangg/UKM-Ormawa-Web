<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekomawa extends Model
{
    use HasFactory;

    protected $table = 'rekomawa';

    protected $fillable = [
        'AdminOrmawa_id',
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
        // '',
    ];

    public function AdminOrmawa()
    {
        return $this->belongsTo(User::class, 'AdminOrmawa_id');
    }

     public function about()
    {
        return $this->belongsTo(About::class, 'AdminOrmawa_id', 'user_id');
    }
}
