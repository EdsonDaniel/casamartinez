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
}
