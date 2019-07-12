<?php

namespace App\Http\Requests\TipoServicio;

use App\TipoServicio;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', TipoServicio::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tips_desc' => 'required|unique:ser_tipo_servicios|min:4|max:250|string',
            'tips_costo' => 'required|between:1,4|',
            'ser_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'tips_desc.required' => '* Campo requerido',
            'tips_desc.unique' => '* El servicio ya existe',
            'tips_desc.min' => '* Mínimo permitido, 4 caracteres',
            'tips_desc.max' => '* Máximo permitido, 60 caracteres',
            'tips_desc.string' => '* Solo letras, números y signos de puntuación',
            'tips_costo.required' => '* Campo requerido',
            'tips_costo.between' => '* Solo números, desde 1 hasta 999',
            'ser_id.required' => '* Campo requerido',
            'ser_id.numeric' => '* Solo números'
        ];
    }
}
