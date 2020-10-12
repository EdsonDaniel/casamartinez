<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionesUsuario extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'direcciones_usuario';

    protected $fillable = [
    	'calle', 'numero', 'numero_interior', 'apartamento', 'colonia', 'municipio',
    	'estado', 'codigo_postal', 'telefono', 'nombre_residente', 'user_id'
    ];
       
}
