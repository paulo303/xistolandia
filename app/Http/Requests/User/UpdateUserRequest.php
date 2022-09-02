<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = $this->user->id ?? '';

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                "unique:users,email,{$id},id",
            ],
            'password' => [
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
            '*.unique'   => 'O <strong>:attribute</strong> já está sendo utilizado!',
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
            'name'  => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha',
        ];
    }
}
