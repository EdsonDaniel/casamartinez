<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
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
        $request = resolve('Illuminate\Http\Request');
        $costo = $request->input('costo');
        $costo++;

        $array_validaciones = [
            'nombre_producto'       =>['required', 'unique:productos,nombre','max:255'],
            'marca'                 =>['required', 'max:255'],
            'descripcion_producto'  =>['required', 'max:700'],
            'numPresentaciones'     =>['required', 'integer', 'min:1', 'max:10'],
            'numCaracteristicas'    =>['required', 'integer', 'min:0', 'max:10'],

            //Validaciones para presentaciones en productos
            'products.*.costo'      =>['required', 'numeric'],
            'products.*.contenido'  =>['required', 'numeric'],
            'products.*.pre_consu'  =>['required', 'numeric', 'min:'.$costo],
            'products.*.pre_distri' =>['required', 'numeric', 'min:'.$costo],
            'products.*.pre_rest'   =>['required', 'numeric', 'min:'.$costo],
            'products.*.pre_promo'  =>['numeric',  'min:'.$costo],
            'products.*.stock'      =>['required', 'integer', 'min:0'],
            'products.*.stock_min'  =>['required', 'integer', 'min:0'],
            'products.*.alto'       =>['required', 'numeric', 'min:0'],
            'products.*.ancho'      =>['required', 'numeric', 'min:0'],
            'products.*.largo'      =>['required', 'numeric', 'min:0'],
            'products.*.peso'       =>['required', 'numeric', 'min:0'],
            'products.*.unidad_c'   =>['required', Rule::in(['ml', 'g','l','kg'])],
            'products.*.estado'     =>['required', 'integer','min:0', 'max:2'],
            'products.*.img'        =>['required'],
            'caracteristicas.*.value' => ['max:255']

        ];

        /*$num_carac = $request->input('caracteristicas.característica1.id');
        if($num_carac > 0){
            $array_validaciones['caracteristicas.*.id'] = 
                'required|exists:App\OtrasCaracteristicas,id_caract';
            $array_validaciones['caracteristicas.*.value'] = 'required|max:255';
        }*/
        return $array_validaciones;
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */

    public function messages(){
        return [
            'required'      => '*Debe llenar este campo :attribute',
            'max'           => 'Exedió el límite permitido para este campo',
            'numeric'       => 'Debe insertar un valor numérico',
            'integer'       => 'Debe insertar un valor entero',
            'min:0'         => 'Debe insertar valores mayores a 0',
            'in'            => 'Debe seleccionar un valor de la lista',

            'nombre_producto.unique' => 'Este nombre ya está registrado',
            'select_caracteristicas.*.exists' => 'No existe la característica seleccionada',
            'products.*.pre_consu.min'  => 'El precio debe ser mayor al costo',
            'products.*.pre_distri.min' => 'El precio debe ser mayor al costo',
            'products.*.pre_rest.min'   => 'El precio debe ser mayor al costo',
            'products.*.pre_promo.min'  => 'El precio debe ser mayor al costo',

            'numPresentaciones.required'=> 'Ocurrió un error inesperado. Por favor inténtelo de nuevo.',
            'numCaracteristicas.required'=> 'Ocurrió un error inesperado. Por favor inténtelo de nuevo.',

            'numPresentaciones.min'=> 'Debe agregar al menos una presentación para el producto.',
            'numPresentaciones.max'=> 'Máximo número de presentaciones alcanzado.',
            'numCaracteristicas.max'=> 'Máximo número de características alcanzado.',

        ];
    }
}
