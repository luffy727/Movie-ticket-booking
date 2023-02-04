<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'movie_id',
        'user_review',
    ];

    /**
     * Get the users that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the movie that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}

