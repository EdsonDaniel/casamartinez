<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'pedidos';

    protected $fillable = [
        'metodo_pago', 'fecha_envio','fecha_entrega', 'id_rastreo', 'paqueteria', 'monto_total', 'costo_envio', 'estado', 'user_id', 'direccion_envio_id', 'direccion_facturacion_id'
    ];

    /**
    * Obtener las direcciones del usuario
    */
       
}
