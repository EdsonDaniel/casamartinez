<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentasMes extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //protected $primaryKey = 'id_presentacion';
    protected $table = 'ventas_mes';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

     protected $casts = [
        'suma' => 'float',
        'dia' => 'integer',
        'conteo' => 'integer'
    ];

    
}
