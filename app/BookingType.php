<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingType extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
}
