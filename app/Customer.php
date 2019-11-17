<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'us_phone_number',
        'us_alternate_number',
        'indian_number',
        'email',
        'airline',
        'query_date',
        'departure_date',
        'arrival_date',
        'passenger_details',
    ];
}