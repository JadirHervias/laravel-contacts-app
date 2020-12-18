<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name' => 'required|min:2|max:150',
            'address' => 'required|min:2|max:150',
            'email' => 'required|email:rfc,dns',
            'phone_number' => 'required|regex:/[0-9]{9}/',
            'photo' => 'image'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Por favor, ingrese el nombre',
            'name.min' => 'Se permiten 2 caracteres como mínimo',
            'name.max' => 'Ha sobrepasado el límite de 150 caracteres',

            'address.required' => 'Por favor, ingrese el address',
            'address.min' => 'Se permiten 2 caracteres como mínimo',
            'address.max' => 'Ha sobrepasado el límite de 150 caracteres',

            'email.required' => 'Por favor, ingrese el email',
            'email.email' => 'Ingrese un email valido',

            'phone_number.required' => 'Por favor, ingrese el telefono',
            'phone_number.regex' => 'Por favor, ingrese un num. celular correcto (9 digitos)',

            'photo.image' => 'Por favor, suba una foto. Formatos recomendados: PNG, JPG o JPEG',
        ];
    }
}
