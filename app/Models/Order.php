<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //use HasFactory;
    protected $fillable = [
        'amount',
        'total',
        'user_id',
        'digital_currenct_id',
        'store_id',
        'status',
    ];
}
