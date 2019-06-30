<?php

namespace App\Http\Requests\Role;

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
        $role = $this->route('role');
        return $this->user()->can('update', $role);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name,' . $this->route('role')->id . '|min:6|max:20|alpha',
            'description' => 'required|min:2|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '* Campo requerido',
            'name.unique' => '* El nombre ya existe',
            'name.min' => '* Mínimo 6 caracteres',
            'name.max' => '* Máximo 20 caracteres',
            'name.alpha' => '* Solo letras',
            'description.required' => '* Campo requerido',
            'description.min' => '* Mínimo 2 caracteres',
            'description.max' => '* Máximo 100 caracteres'
        ];
    }
}
