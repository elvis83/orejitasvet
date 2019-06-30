<?php

namespace App\Http\Requests\TipoDocumento;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipd_nombre' => 'required|unique:res_tipodocumentos,tipd_nombre,' . $this->route('res_tipodocumentos')->tipd_id . '|min:3|max:70|alpha',
            'tipd_abreviatura' => 'required|unique:res_tipodocumentos|min:3|max:3|alpha',
        ];
    }

    public function messages()
    {
        return [
            'tipd_nombre.required' => '* Campo requerido',
            'tipd_nombre.unique' => '* El nombre ya existe',
            'tipd_nombre.min' => '* Mínimo 3 caracteres',
            'tipd_nombre.max' => '* Máximo 70 caracteres',
            'tipd_nombre.alpha' => '* Solo letras',
            'tipd_abreviatura.required' => '* Campo requerido',
            'tipd_abreviatura.unique' => '* El nombre ya existe',
            'tipd_abreviatura.min' => '* Mínimo 3 caracteres',
            'tipd_abreviatura.max' => '* Máximo 3 caracteres',
            'tipd_abreviatura.alpha' => '* Solo letras',
        ];
    }
}
