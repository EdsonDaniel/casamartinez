<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntrada extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'parcela'             => ['required', 'min:1', 'max:190'],
            'ubicacion'           => ['required', 'min:1', 'max:190'],
            'fecha_cultivo'       => ['required', 'date'],
            'fecha_corte'         => ['required', 'date'],
            'tipo_maguey'         => ['required', 'min:1', 'max:190'],
            'magueyes_cortados'   => ['required', 'min:1', 'integer'],
            'kilogramos'          => ['required', 'min:1', 'numeric'],
            'maestro_magueyero'   => ['required', 'min:1', 'max:190'],
            'maestro_mezcalero'   => ['required', 'min:1', 'max:5'],
            
            'ingreso_coccion'     => ['required', 'date'],
            'salida_coccion'      => ['required', 'date'],
            
            'inicio_molienda'     => ['required', 'date'],
            'terminomolienda'     => ['required', 'date'],
            'tinas_molienda'      => ['nullable', 'min:1', 'integer'],
            
            'inicio_fermentacion' => ['required', 'date'],
            'salida_fermentacion' => ['required', 'date'],
            'volumen_fermentacion'=> ['required', 'numeric', 'min:1'],
            
            'fecha_destilacion1'  => ['required', 'date'],
            'volumen_destilacion1'=> ['required', 'numeric', 'min:1'],
            'alcohol_destilacion1'=> ['required', 'numeric', 'min:1', 'max:190'],
            
            'fecha_destilacion2'  => ['nullable', 'date'],
            'volumen_destilacion2'=> ['nullable', 'numeric', 'min:1'],
            'alcohol_destilacion2'=> ['nullable', 'numeric', 'min:1', 'max:190'],
            
            'traslado_envasadora' => ['required', 'date'],
            'lote_granel'         => ['required', 'min:1', 'max:190'],
            'lote_envasado'       => ['required', 'min:1', 'max:190'],
            'analisis'            => ['required', 'min:1', 'max:190'],
            'botellas_envasadas'  => ['required', 'integer', 'min:1', 'max:190'],
            'clase_mezcal'        => ['required', 'min:1', 'max:190'],
            'porcentaje_alc_env'  => ['required', 'numeric', 'min:1', 'max:190'],
            'producto_id'         => ['required', 'integer', 'exists:productos,id'],
            'presentacion_id'     => ['required', 'integer', 'exists:presentaciones_productos,id'],
        ];
    }
}
