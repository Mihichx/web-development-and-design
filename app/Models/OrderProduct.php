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
        'reason_for_cancellation',
        'order_date',
        'arrival_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }
}
