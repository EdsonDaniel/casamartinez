<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosTienda extends Model
{
    protected $table = 'productos_tienda';

    public $timestamps = false;

     protected $casts = [
        'estado_presentacion' => 'integer',
        'precio_consumidor'	  => 'numeric'
    ];
}
