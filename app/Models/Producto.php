<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    //productos
    protected $fillable = [
        'name',
        'price',
        'photo',
        'observation',
        'size'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
