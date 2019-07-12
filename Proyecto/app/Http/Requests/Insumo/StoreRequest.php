<?php

namespace App\Http\Requests\Insumo;

use App\Insumo;
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
        return $this->user()->can('create', Insumo::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ins_desc' => 'required|unique:ser_insumos|min:4|max:250',
            'ins_uni' => 'required|max:25',
            'ins_stock' => 'required|numeric|digits_between:2,3',
            'ins_fecven' => 'required|date_format:Y-m-d|after:today',
            'ins_estado' => 'required|alpha'
        ];
    }

    public function messages()
    {
        return [
            'ins_desc.required' => '* La descripción es requerida',
            'ins_desc.unique' => '* La descripción ya existe',
            'ins_desc.min' => '* Mínimo permitido es de 4 caracteres',
            'ins_desc.max' => '* Máximo permitido es de 250 caracteres',
            'ins_uni.required' => '* Campo requerido',
            'ins_stock.required' => '* Campo requerido',
            'ins_stock.numeric' => '* Solo se acepta números',
            
            'ins_fecven.required' => '* Campo requerido',
            'ins_fecven.after' => '* La fecha debe ser mayor',
            'ins_estado.required' => '* Campo requerido'
        ];
    }
}
