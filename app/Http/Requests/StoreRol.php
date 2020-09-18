<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Permission;

class StoreRol extends FormRequest
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
        $max_permisos = Permission::count() - 1;
        return [
            'name'        => ['required', 'unique:roles', 'max:100', 'min:3'],
            'description' => ['required', 'max:255'],
            'permisos'    => ['array', 'max:'.$max_permisos]
        ];

    }
    public function attributes()
    {
        return [
            'name'        => 'Nombre',
            'description' => 'Descripción'
        ];
    }

    public function messages(){
        return [
            'name.unique' => 'Un rol con este nombre ya está registrado.',
            'permisos.max'    => 'Sólo el rol "admin" puede tener todos los permisos.'
        ];
    }
}
