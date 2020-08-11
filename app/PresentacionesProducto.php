<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresentacionesProducto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'presentacion_producto';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pres_prod';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'contenido', 'unidad_c', 'precio_consumidor',
        'precio_distribuidor','precio_restaurant', 'precio_promocion',
        'costo_adquisicion', 'estado', 'stock', 'stock_min', 'peso', 'alto',
        'ancho', 'id_product'
    ];
}
