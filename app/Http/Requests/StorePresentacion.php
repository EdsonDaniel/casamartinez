<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePresentacion extends FormRequest
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
        $array_validaciones = [
            'new_pres.*.costo'      =>['nullable', 'numeric'],
            'new_pres.*.contenido'  =>['required', 'numeric', 'min:1'],
            'new_pres.*.pre_consu'  =>['required', 'numeric', 'min:0'],
            'new_pres.*.pre_distri' =>['required', 'numeric', 'min:0'],
            'new_pres.*.pre_rest'   =>['required', 'numeric', 'min:0'],
            'new_pres.*.pre_promo'  =>['nullable', 'numeric', 'min:0'],
            'new_pres.*.stock'      =>['required', 'integer', 'min:0'],
            'new_pres.*.stock_min'  =>['required', 'integer', 'min:0'],
            'new_pres.*.alto'       =>['nullable', 'numeric', 'min:0'],
            'new_pres.*.ancho'      =>['nullable', 'numeric', 'min:0'],
            'new_pres.*.largo'      =>['nullable', 'numeric', 'min:0'],
            'new_pres.*.peso'       =>['nullable', 'numeric', 'min:0'],
            'new_pres.*.unidad_c'   =>['required', Rule::in(['ml', 'g','l','kg'])],
            'new_pres.*.estado'     =>['required', 'integer','min:-1', 'max:3'],
            'new_pres.*.img'        =>['required', 'image'],

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
            'required'      => 'No llenó alguno de los campos obligatorios (:attribute)',
            'max'           => 'Exedió el límite permitido para algún campo',
            'numeric'       => 'Debe insertar un valor numérico',
            'integer'       => 'Debe insertar un valor entero. (:input) no se considera entero.',
            'min:0'         => 'Debe insertar valores mayores a 0',
            'in'            => 'Debe seleccionar un valor de la lista',
            'new_pres.*.required' => 'Debe adjuntar un archivo de tipo imagen (jpeg, png, bmp, gif, svg, or webp)',
            'new_pres.*.img'=> 'Debe adjuntar un archivo de tipo imagen (jpeg, png, bmp, gif, svg, or webp)',
        ];
    }

    public function getValidator(){
        return $this->getValidatorInstance();
    }

}
