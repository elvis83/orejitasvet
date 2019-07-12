<?php

namespace App\Http\Requests\Medicamento;

use App\Medicamento;
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
        return $this->user()->can('create', Medicamento::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'medi_nombre' => 'required|min:4|max:70',
            'medi_desc' => 'required|min:4|max:250',
            'medi_pres' => 'required|max:35',
            'medi_stock' => 'required|numeric|digits_between:0,999.99',
            'medi_fecven' => 'required|date_format:Y-m-d|after:today',
            'medi_estado' => 'required|alpha',
            'medi_precio' => 'required|numeric|digits_between:1,4'
        ];
    }

    public function messages()
    {
        return [
            'medi_nombre.required' => '* Campo requerido',
            'medi_nombre.min' => '* Mínimo permitido es de 4 caracteres',
            'medi_nombre.max' => '* Máximo permitido es de 70 caracteres',
            'medi_desc.required' => '* Campo requerido',
            'medi_desc.min' => '* Mínimo permitido es de 4 caracteres',
            'medi_desc.max' => '* Máximo permitido es de 250 caracteres',
            'medi_pres.required' => '* Campo requerido',
            'medi_pres.max' => '* Máximo permitido es de 35 caracteres',
            'medi_stock.required' => '* Campo requerido',
            'medi_stock.numeric' => '* Solo se acepta números',            
            'medi_fecven.required' => '* Campo requerido',
            'medi_fecven.after' => '* La fecha debe ser mayor',
            'medi_estado.required' => '* Campo requerido',
            'medi_precio.required' => '* Campo requerido',
            'medi_precio.numeric' => '* Solo se acepta números'
        ];
    }
}
