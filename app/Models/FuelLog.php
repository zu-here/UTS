<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelLog extends Model
{
    use HasFactory;
    protected $fillable = ['bus_id', 'user_id', 'amount_liters', 'cost', 'refuel_date', 'document_path'];
}
