<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearUsuarioRequest extends FormRequest
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
        $rules = [
            'user' => 'required|unique:users|max: 20',
            'Nombre' => 'required|max: 20',
            'Segundo_nombre' => 'required|max: 20',
            'Apellido' => 'required|max: 20',
            'Segundo_apellido' => 'required|max: 20',
            'password' => 'required|min: 8|max: 30',
        ];

        return $rules;
    }
}
