<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionesEnvio extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'direcciones_envio';

    protected $fillable = [
    	'calle', 'numero', 'numero_interior', 'apartamento', 'colonia', 'municipio',
    	'estado', 'codigo_postal', 'telefono', 'nombre_residente'
    ];
       
}
