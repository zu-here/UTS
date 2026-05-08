<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseRequest extends Model
{
    use HasFactory;
    protected $fillable = ['bus_id', 'item_name', 'description', 'estimated_cost', 'status'];
}
