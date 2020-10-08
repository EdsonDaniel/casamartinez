<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendados extends Model
{
    protected $table = 'recomendados';

    public $timestamps = false;

     protected $casts = [
        'precio_consumidor'   => 'float',
    ];
}
