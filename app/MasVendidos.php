<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasVendidos extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //protected $primaryKey = 'id_presentacion';
    protected $table = 'mas_vendidos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

     protected $casts = [
        'suma' => 'integer',
    ];

    
}
