<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'nombre',
        'categoria',
        'precio',
        'valor_fabrica',
        'imagen',
    ];
}