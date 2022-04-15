<?php

namespace App\Http\Requests\Convidado;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvidadoRequest extends FormRequest
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
            'nome' => [
                'min:2',
                'max:255',
            ],
            'email' => [
                'nullable',
                'min:2',
                'max:255',
            ],
            'celular' => [
                'nullable',
                'min:10',
                'max:30',
            ],
            'patrocinador' => [
                'boolean',
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
            'nome'    => 'Nome',
            'email' => 'E-mail',
            'celular'   => 'Celular',
            'patrocinador'   => 'Patrocinador',
        ];
    }
}
