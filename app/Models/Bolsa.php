<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'categoria',
        'imagen'
    ];
}