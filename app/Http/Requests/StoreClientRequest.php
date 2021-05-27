<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
    public function rules(){
        return [
            'curriculo' => 'required|file|mimes:pdf,doc,docx,txt|max:500',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address.country' => 'required',
            'address.state' => 'required',
            'address.city' => 'required',
            'address.neighborhood' => 'required',
            'address.street' => 'required',
            'address.number' => 'required',
        ];
    }
    public function messages(){
        return [
            'curriculo.required' => 'O curriculo é obrigatório',
            'curriculo.file' => 'Erro ao carregar o arquivo, tente novamente.',
            'curriculo.mimes' => 'Ops! os tipos de arquivo aceitos são doc, docx, txt e pdf.',
            'curriculo.max' => 'Seu arquivo não pode ser maior do que 500kb',
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Esse email é inválido, tente outro.',
            'telefone.required' => 'O telefone é obrigatório',
            'address.country.required' => 'O país é obrigatório',
            'address.state.required' => 'O estado é obrigatório',
            'address.city.required' => 'A cidade é obrigatório',
            'address.neighborhood.required' => 'O bairro é obrigatório',
            'address.street.required' => 'A rua é obrigatório',
            'address.number.required' => 'O número é obrigatório',
        ];
    }
}
