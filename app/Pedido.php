<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pedido extends Model
{
	use Notifiable;
    protected $primaryKey = 'id';
    protected $table = 'pedidos';

    protected $fillable = [
        'metodo_pago', 'fecha_envio','fecha_entrega', 'id_rastreo', 'paqueteria', 'monto_total', 'costo_envio', 'estado', 'user_id', 'direccion_envio_id', 'direccion_facturacion_id', 'id_pago', 'email'
    ];
    protected $casts = [
        'estado' => 'integer',
    ];

    public function productos()
    {
        return $this->belongsToMany(
            'App\PresentacionesProducto', 
            'productos_comprados', 
            'pedido_id', 
            'id')
            ->withPivot('cantidad', 'precio_unitario');
    }
       
}
