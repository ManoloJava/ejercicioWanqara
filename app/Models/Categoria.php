<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorys';
    //categorias
    protected $fillable = [
        'name',
        'observation'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}