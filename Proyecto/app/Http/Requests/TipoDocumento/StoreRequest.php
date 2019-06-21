<?php

namespace App\Http\Requests\TipoDocumento;

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
            'tipd_nombre' => 'required|unique:res_tipodocumentos|max:70',
            'tipd_abreviatura' => 'required|unique:res_tipodocumentos|max:3',
        ];
    }

    public function messages()
    {
        return [
            'tipd_nombre.required' => '* Campo requerido',
            'tipd_nombre.unique' => '* El nombre ya existe',
            'tipd_abreviatura.required' => '* Campo requerido',
            'tipd_abreviatura.unique' => '* El nombre ya existe',
        ];
    }
}
