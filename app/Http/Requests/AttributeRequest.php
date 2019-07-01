<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'name'  => 'required|min:2',
            'type'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'É necessário informar um nome para o Atributo',
            'name.min'          => 'O nome do Atributo é muito pequeno',
            'type.required'     => 'Informe o Tipo de atributo'
        ];
    }
}
