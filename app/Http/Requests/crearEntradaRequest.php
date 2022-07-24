<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearEntradaRequest extends FormRequest
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
            'Nombre_actividad' => ['required','max: 100'],
            'Descripcion_actividad' => ['max: 255'],
            'Hora' => ['required'],
        ];

        return $rules;
    }
}
