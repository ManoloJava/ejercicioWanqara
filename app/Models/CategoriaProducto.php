<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $table = 'categorys_products';
    //categorias de productos y promotion
    protected $fillable = [
        'category_id',
        'product_id',
        'promotion'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
