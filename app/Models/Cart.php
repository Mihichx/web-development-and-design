<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

   public $timestamps = false;

   protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
