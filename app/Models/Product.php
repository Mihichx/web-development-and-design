<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'name',
        'small_description',
        'description',
        'model',
        'country',
        'release_at',
        'prise',
        'category_id',
        'quantity',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
