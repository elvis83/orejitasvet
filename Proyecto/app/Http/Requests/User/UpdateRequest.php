<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    
    public function authorize()
    {
        $user = $this->route('user');
        return $this->user()->can('update', $user);
    }

    public function rules()
    {
        return [            
            'name' => 'required|string|min:3|max:255',
            'dob' => 'required',
            'email' => 'required|string|email|unique:users,email,' . $this->route('user')->id . '|min:7|max:255',           
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '* Campo requerido',
            'name.string' => '* Valor no correcto',
            'name.min' => '* Solo se permite 3 caracteres mínimos',
            'name.max' => '* Solo se permite 120 caracteres máximo',
            'dob.required' => '* Campo requerido',
            'email.required' => '* Campo requerido',
            'email.string' => '* Valor no correcto',
            'email.min' => '* Solo se permite 7 caracteres',
            'email.max' => '* Solo se permite 255 caracteres',
            'email.unique' => '* Este email ya está registrado',
        ];
    }
}
