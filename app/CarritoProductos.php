<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarritoProductos extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = 'carrito_tiene_productos';
    protected $casts = [
        'cantidad' => 'integer',
    ];
    

}
