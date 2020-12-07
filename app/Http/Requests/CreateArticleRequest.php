<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'stock' => 'required|integer',
        ];
    }

    public function messages(){
        return [
            'description.required' => 'Por favor, ingrese la sescripcion',
            'description.string' => 'Descripcion incorrecta',

            'cost.required' => 'Por favor, ingrese el costo',
            'cost.numeric' => 'Costo dede ser un valor numerico',

            'stock.required' => 'Por favor, ingrese el stock',
            'stock.integer' => 'Stock debe ser un entero',
        ];
    }
}
