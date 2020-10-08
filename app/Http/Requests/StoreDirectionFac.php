<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectionFac extends FormRequest
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
            'nombre_facturacion'        => ['required', 'min:1', 'max:190'],
            'apellidos_facturacion'     => ['required', 'min:1', 'max:190'],
            'email_facturacion'         => ['required', 'email', 'min:1', 'max:190'],
            'telefono_facturacion'      => ['required', 'size:10'],
            'calle_facturacion'         => ['required', 'min:1', 'max:190'],
            'no_exterior_facturacion'   => ['required', 'min:1', 'max:190'],
            'no_interior_facturacion'   => ['nullable', 'min:1', 'max:190'],
            'apartamento_facturacion'   => ['nullable','min:1', 'max:190'],
            'codigo_postal_facturacion' => ['required', 'min:1', 'max:5'],
            'colonia_facturacion'       => ['required', 'min:1', 'max:190'],
            'municipio_facturacion'     => ['required', 'min:1', 'max:190'],
            'estado_facturacion'        => ['required', 'min:1', 'max:190'],
        ];
    }
}
