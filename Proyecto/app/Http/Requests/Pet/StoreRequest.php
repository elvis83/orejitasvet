<?php

namespace App\Http\Requests\Pet;

use App\Pet;
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
        return $this->user()->can('create', Pet::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mas_nombre' => 'required|min:3|max:35|alpha',
            'mas_tipo' => 'required|alpha',
            'mas_raza' => 'required|alpha|min:3|max:70',
            'mas_sexo' => 'required|min:1|max:1|alpha',
            'mas_gs' => 'alpha_num|nullable|min:4|max:4',
            'mas_alergia' => 'alpha|nullable|max:100',
            'mas_fecnac' => 'required|date_format:Y-m-d|before:today',
            'mas_color' => 'required|min:3|max:25|alpha',
            'mas_foto' => 'nullable|max:100',
            'mas_estado' => 'required|min:1|max:1|alpha',
            'user_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'mas_nombre.required' => '* Campo requerido',
            'mas_nombre.min' => '* Mínimo permitido, 3 caracteres',
            'mas_nombre.max' => '* Máximo permitido, 35 caracteres',
            'mas_nombre.alpha' => '* Solo letras',
            'mas_tipo.required' => '* Campo requerido',
            'mas_tipo.alpha' => '* Solo letras',
            'mas_raza.required' => '* Campo requerido',
            'mas_raza.alpha' => '* Solo letras',
            'mas_raza.min' => '* Mínimo permitido, 3 caracteres',
            'mas_raza.max' => '* Máximo permitido, 70 caracteres',
            'mas_sexo.required' => '* Campo requerido',
            'mas_sexo.alpha' => '* Solo letras',
            'mas_sexo.min' => '* Mínimo permitido, 1 caracteres',
            'mas_sexo.max' => '* Máximo permitido, 1 caracteres',
            'mas_gs.alpha_num' => '* ´Solo letras y números',
            'mas_gs.nullable' => '* Campo vacío',
            'mas_gs.min' => '* Mínimo permitido, 4 caracteres',
            'mas_gs.max' => '* Máximo permitido, 4 caracteres',
            'mas_alergia.alpha' => '* Campo requerido',
            'mas_alergia.nullable' => '* Campo vacío',
            'mas_alergia.max' => '* Máximo permitido, 100 caracteres',
            'mas_fecnac.required' => '* Campo requerido',
            'mas_fecnac.before' => '* La fecha debe ser anterior',
            'mas_color.required' => '* Campo requerido',
            'mas_color.alpha' => '* Solo letras',
            'mas_color.min' => '* Mínimo permitido, 3 caracteres',
            'mas_color.max' => '* Máximo permitido, 25 caracteres',
            'mas_foto.nullable' => '* Campo vacío',
            'mas_foto.max' => '* Máximo permitido, 100 caracteres',
            'mas_estado.required' => '* Campo requerido',
            'mas_estado.alpha' => '* Solo letras',
            'mas_estado.min' => '* Mínimo permitido, 1 caracteres',
            'mas_estado.max' => '* Máximo permitido, 1 caracteres',
            'user_id.required' => '* Campo requerido',
            'user_id.numeric' => '* Solo números'
        ];
    }
}
