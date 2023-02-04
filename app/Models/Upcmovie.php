<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upcmovie extends Model
{
    use HasFactory;

    protected $table = 'upcmovies';

    protected $fillable = [
        'umname',
        'umtype',
        'sdescription',
        'image',
        'rdate',
        'trailer',
    ];
}
