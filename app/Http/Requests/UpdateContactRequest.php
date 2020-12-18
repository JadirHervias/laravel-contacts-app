<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
            'name' => 'nullable|max:150',
            'address' => 'nullable|max:150',
            'email' => 'nullable|email:rfc,dns',
            'phone_number' => 'nullable|regex:/[0-9]{9}/',
            // 'phone_number' => 'nullable|string',
            'photo' => 'nullable|image'
        ];
    }

    public function messages(){
        return [
            'name.max' => 'Ha sobrepasado el límite de 150 caracteres',

            'address.max' => 'Ha sobrepasado el límite de 150 caracteres',

            'email.email' => 'Ingrese un email valido',

            'phone_number.regex' => 'Por favor, ingrese un num. celular correcto (9 digitos)',

            'photo.image' => 'Por favor, suba una foto. Formatos recomendados: PNG, JPG o JPEG',
        ];
    }
}
