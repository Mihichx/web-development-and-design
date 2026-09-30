<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   protected $primaryKey = 'id';

   public $timestamps = false;

   protected $fillable = [ // FIXME: Добавить новые столбики
        'id',
        'img',
        'name',
        'description',
        'yer_release',
        'prise',
    ];
}
