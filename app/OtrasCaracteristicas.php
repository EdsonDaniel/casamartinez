<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtrasCaracteristicas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'otras_caracteristicas';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_caract';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(
            'App\Productos', 
            'productos_tienen_caracteristicas', 
            'id_caract', 
            'id_product');
        ;
    }
}
