<?php

namespace App\Http\Requests\Funcao;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFuncaoRequest extends FormRequest
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
        $id = $this->funcao->id ?? '';

        return [
            'nome' => [
                'required',
                "unique:funcoes,nome,{$id},id",
                'string',
                'min:3',
                'max:255',
            ],
            'descricao' => [
                'string',
                'nullable',
                'min:3',
                'max:255',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => 'O campo <strong>:attribute</strong> é obrigatório!',
            '*.min'      => 'O campo <strong>:attribute</strong> deve ter no mínimo :min caracteres!',
            '*.max'      => 'O campo <strong>:attribute</strong> deve ter no máximo :max caracteres!',
            '*.unique'   => '<strong>:attribute</strong> já está sendo utilizado!',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nome'  => 'Nome',
            'descricao' => 'Descrição',
        ];
    }
}
