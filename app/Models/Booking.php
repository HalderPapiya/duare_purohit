<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
        'userId',
        'pujaId',
        'uniqueId',
        'amount',
        'advance_amount',
        'after_service',
        'date',
        'time',
        'address',
        'city',
        'landmark',
        'pin',
        'mobile',
        'status',
        'is_paid',
        'transaction_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId', 'id');
    }

    public function pujaDetails()
    {
        return $this->belongsTo('App\Models\Puja', 'pujaId', 'id');
    }
    public function pujaName()
    {
        return $this->belongsTo('App\Models\Puja', 'puja_name', 'id');
    }
}