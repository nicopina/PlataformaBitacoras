<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class actualizarUsuarioRequest extends FormRequest
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
            'user' => ['required',Rule::unique('users')->ignore($this->id),'max: 20'],
            'Nombre' => 'required|max: 20',
            'Segundo_nombre' => 'required|max: 20',
            'Apellido' => 'required|max: 20',
            'Segundo_apellido' => 'required|max: 20',
        ];
        if($this->password != null){
            $rules = array_merge($rules,[
                'password' => 'required|min: 8|max: 30',
            ]);
        }

        return $rules;
    }
}
