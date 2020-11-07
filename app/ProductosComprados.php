<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosComprados extends Model
{
    protected $table = 'productos_comprados';
    //protected $primaryKey = 'id_presentacion';
    public $timestamps = false;
    protected $fillable = [
    	'id', 'cantidad', 'precio_unitario', 'pedido_id'
    ];
}
