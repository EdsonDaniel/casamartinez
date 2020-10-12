<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosTienda extends Model
{
    protected $table = 'productos_tienda';

    public $timestamps = false;
    protected $primaryKey = 'id_presentacion';

     protected $casts = [
        'estado_presentacion' => 'integer',
        'precio_consumidor'	  => 'float',
        'peso'	  => 'float'
    ];
}
