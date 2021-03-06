<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosCaracteristicas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productos_tienen_caracteristicas';
    

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //protected $primaryKey = 'id_caract';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'prod_id', 'carac_id' ,'valor'
    ];
}
