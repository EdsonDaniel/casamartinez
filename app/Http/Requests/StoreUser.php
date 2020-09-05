<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
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

            'name'          =>['max:100'],
            'last_name'     =>['max:150'],
            'email'         =>['unique:users,email','max:100'],
            'tipo_usuario'  =>['integer', 'min:1', 'max:5'],        
        ];

    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'last_name' => 'Apellidos',
            'tipo_usuario' => 'Tipo de usuario'
        ];
    }

    public function messages(){
        return [
            'email.unique'=> 'Este email ya está registrado',
        ];
    }
}
