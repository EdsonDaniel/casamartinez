<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';
    protected $fillable = [
        'parcela', 'ubicacion', 'fecha_cultivo','fecha_corte','tipo_maguey','magueyes_cortados','kilogramos','maestro_magueyero','maestro_mezcalero','ingreso_coccion','salida_coccion','inicio_molienda','terminomolienda','tinas_molienda','inicio_fermentacion','salida_fermentacion','volumen_fermentacion','fecha_destilacion1','volumen_destilacion1','alcohol_destilacion1','fecha_destilacion2','volumen_destilacion2','alcohol_destilacion2','traslado_envasadora','lote_granel','lote_envasado','analisis','botellas_envasadas','clase_mezcal','porcentaje_alc_env','producto_id','presentacion_id'
    ];

}
