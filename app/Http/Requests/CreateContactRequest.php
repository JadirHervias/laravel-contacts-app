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
            'name' => 'required|min:2|max:150|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'address' => 'required|min:2|max:150|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'email' => 'required|email:rfc,dns',
            'phone_number' => 'required|numeric'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Por favor, ingrese el nombre',
            'name.min' => 'Se permiten 2 caracteres como mínimo',
            'name.max' => 'Ha sobrepasado el límite de 150 caracteres',
            'name.regex' => 'Caracteres inválidos. Por favor, vuelva a ingresar los datos',

            'address.required' => 'Por favor, ingrese el address',
            'address.min' => 'Se permiten 2 caracteres como mínimo',
            'address.max' => 'Ha sobrepasado el límite de 150 caracteres',
            'address.regex' => 'Caracteres inválidos. Por favor, vuelva a ingresar los datos',

            'email.required' => 'Por favor, ingrese el email',
            'email.email' => 'Ingrese un email valido',

            'phone_number.numeric' => 'Ingrese un numero de telefono valido',
        ];
    }
}
