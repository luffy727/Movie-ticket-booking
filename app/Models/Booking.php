<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'm_name',
        'user_id',
        'cname',
        'cmail',
        'cphone',
        'm_hall',
        'seatqty',
        'mdate',
        'mtime',
        'total_price',
        'status',
        'payment_mode',
        'payment_id',
    ];

    public function mdetails()
    {
        return $this->belongsTo(Movie::class,'m_name','mname');
    }
}

