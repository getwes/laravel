<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class seriesformrequest extends FormRequest
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
            'nome' => 'required|min:2'
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'o campo nome é obrigatorio:-:',
            'nome.min' => 'o campo precisa ter pelo menos 2 caracteres ;-;'

        ];
    }
}
