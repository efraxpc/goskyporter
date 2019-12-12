<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $dates = ['query_date'];
    protected $fillable = [
        'query_status',
        'bookingsource',
        'bookingtype',
        'querytype',
        'airport',
        'visastatus',
        'origin',
        'destination',
        'query_date',
        'departure_date',
        'arrival_date',
        'passenger_details',
        'airline',
        'remarks',
        'customer',
        'user_loggedin',
        'pnr_number',
    ];
}
