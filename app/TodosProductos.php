<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodosProductos extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_product';
    protected $table = 'todos_productos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    
}
