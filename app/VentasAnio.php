<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentasAnio extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //protected $primaryKey = 'id_presentacion';
    protected $table = 'ventas_anio';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

     protected $casts = [
        'suma' => 'integer',
        'mes' => 'integer',
        'conteo' => 'integer'
    ];

    
}
