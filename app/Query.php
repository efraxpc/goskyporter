<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $fillable = [
        'querystatus',
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
    ];
}
