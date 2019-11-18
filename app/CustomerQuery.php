<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerQuery extends Model
{
    protected $fillable = [
        'customer_id',
        'query_id'
    ];
}
