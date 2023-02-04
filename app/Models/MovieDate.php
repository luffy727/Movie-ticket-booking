<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDate extends Model
{
    use HasFactory;

    protected $table = 'movie_dates';

    protected $fillable = [
        'movie_id',
        'movie_date',
        'movie_time',
        'movie_seats',
    ];

    public function movies()
    {
        return $this->belongsTO(Movie::class, 'movie_id', 'id');
    }
}
