<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'name'  => 'required|min:3',
            'origin'=> 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário informar um Nome de Área do Processo',
            'name.min' => 'É necessário informar um Nome com mínimo de 3 caracteres',
            'origin.required'  => 'É necessário informar a Origem do processo',
        ];
    }
}
