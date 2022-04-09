<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFestaRequest extends FormRequest
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
            'data' => [
                'required',
                'date',
            ],
            'atracoes' => [
                'nullable',
                'min:2',
                'max:255',
            ],
            'flyer' => [
                'nullable',
                'image',
                'max:2048',
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
            '*.min'      => 'O campo <strong>:attribute</strong> deve ter no mínimo 2 caracteres!',
            '*.max'      => 'O campo <strong>:attribute</strong> deve ter no máximo 255 caracteres!',
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
            'data'    => 'Data',
            'atracoes' => 'Atrações',
            'flyer'   => 'Flyer',
        ];
    }
}
