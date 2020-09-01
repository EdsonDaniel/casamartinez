<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_product';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
    * Obtener las caracteristicas adicionales del producto
    */

    public function caracteristicas()
    {
        return $this->belongsToMany(
            'App\OtrasCaracteristicas', 
            'productos_tienen_caracteristicas', 
            'id_product', 
            'id_caract')
            ->withPivot('valor');
        ;
    }

    public function presentaciones(){
        return $this->hasMany('App\PresentacionesProducto', 'id_product', 'id_pres_prod');
    }

    
}
