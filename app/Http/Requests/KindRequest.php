<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KindRequest extends FormRequest
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
            'area_id' => 'required|exists:areas,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário informar um nome para o Tipo de Processo',
            'name.min' => 'O nome para o Tipo de Processo deve ter mais de 3 caracteres',
            'area_id.required' => 'É necessário selecionar uma Área Processual Cadastrada',

        ];
    }
}
