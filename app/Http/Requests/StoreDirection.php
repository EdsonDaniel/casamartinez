<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirection extends FormRequest
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
            'nombre'        => ['required', 'min:1', 'max:190'],
            //'nombre_facturacion'    => ['required', 'min:1', 'max:190'],
            //'apellidos_facturacion' => ['required', 'min:1', 'max:190'],
            'apellidos'     => ['required', 'min:1', 'max:190'],
            'email'         => ['required', 'email', 'min:1', 'max:190'],
            //'email_facturacion' => ['required', 'min:1', 'max:190'],
            'telefono'      => ['required', 'size:10'],
            //'telefono_facturacion' => ['required', 'min:1', 'max:190'],
            'calle'         => ['required', 'min:1', 'max:190'],
            //'calle_facturacion' => ['required', 'min:1', 'max:190'],
            'no_exterior'   => ['required', 'min:1', 'max:190'],
            //'no_exterior_facturacion' => ['required', 'min:1', 'max:190'],
            'no_interior'   => ['nullable', 'min:1', 'max:190'],
            //'no_interior_facturacion' => ['required', 'min:1', 'max:190'],
            'apartamento'   => ['nullable','min:1', 'max:190'],
            //'apartamento_facturacion' => ['required', 'min:1', 'max:190'],
            'codigo_postal' => ['required', 'min:1', 'max:5'],
            //'codigo_postal_facturacion' => ['required', 'min:1', 'max:190'],
            'colonia'       => ['required', 'min:1', 'max:190'],
            //'colonia_facturacion' => ['required', 'min:1', 'max:190'],
            'municipio'     => ['required', 'min:1', 'max:190'],
            'estado'        => ['required', 'min:1', 'max:190'],
        ];
    }
}
