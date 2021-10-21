<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //use HasFactory;
    protected $fillable = [
        'store_name',
        'amount',
        'price_per_unit',
        'user_id',
        'digital_currency_id',
    ];
}
