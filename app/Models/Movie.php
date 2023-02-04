<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'mname',
        'mtype',
        'mdescription',
        'hall',
        'image',
        'seat_qty',
        'chticket_price',
        'adticket_price',
        'trending',
        'date',
        'time',
        'video_url',
    ];
}
