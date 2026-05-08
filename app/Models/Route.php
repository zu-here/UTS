<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'path',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
