<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

   protected $primaryKey = 'id';

   public $timestamps = false;

   protected $fillable = [
        'id',
        'user_id',
        'value',
        'order_status_id',
        'order_date',
        'arrival_date',
    ];
}
