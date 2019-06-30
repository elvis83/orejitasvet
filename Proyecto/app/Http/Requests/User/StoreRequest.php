<?php

namespace App\Http\Requests\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('create', User::class);
    }

    public function rules()
    {
        return [
            'role' => 'required|numeric',
            'name' => 'required|string|min:3|max:255',
            'dob' => 'required',
            'email' => 'required|string|email|min:7|max:255|unique:users',
            'password' => 'required|string|min:8|max:25|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'role.required' => '* Campo requerido',
            'role.numeric' => '* Valor no correcto',
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
            'password.required' => '* Campo requerido',
            'password.string' => '*Valor incorrecto',
            'password.min' => '* La contraseña debe tener al menos 8 caracteres',
            'password.max' => '* La contraseña debe tener máximo 25 caracteres',
            'password.confirmed' => '* Las contraseñas no coinciden',
        ];
    }
}
