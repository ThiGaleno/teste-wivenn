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
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
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
