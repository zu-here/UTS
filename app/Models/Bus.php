<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Route;

class Bus extends Model
{
    //
    protected $table = 'buses';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'route_id',
        'capacity',
        'sitting_capacity',
        'available_capacity',
        'ds_id'
    ];

    public function route()
    {
        return $this->belongsTo(\App\Models\Route::class, 'route_id');
    }

    public function driver()
    {
        return $this->belongsTo(\App\Models\User::class, 'ds_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
