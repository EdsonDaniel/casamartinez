<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = 'carrito_compras';
    //protected $primaryKey = 'id_carrito';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    /**
    * Obtener los productos del carrito
    */

    protected $fillable = [
        'user_id'
    ];

    public function productos()
    {
        return $this->belongsToMany(
            'App\PresentacionesProducto', 
            'carrito_productos', 
            'id_carrito', 
            'id_pres_prod')
            ->withPivot('cantidad');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    
}
