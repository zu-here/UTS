<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'capacity',
        'route_name',
        'ds_id',
        'seat_status',
        'payment_method'
    ];
}
