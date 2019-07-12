<?php

namespace App\Http\Requests\Servicio;

use App\Servicio;
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
        return $this->user()->can('create', Servicio::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ser_nombre' => 'required|unique:ser_servicios|min:4|max:60|alpha',
        ];
    }

    public function messages()
    {
        return [
            'ser_nombre.required' => '* Campo requerido',
            'ser_nombre.unique' => '* El servicio ya existe',
            'ser_nombre.min' => '* Mínimo permitido, 4 caracteres',
            'ser_nombre.max' => '* Máximo permitido, 60 caracteres',
            'ser_nombre.alpha' => '* Solo letras'
        ];
    }
}
