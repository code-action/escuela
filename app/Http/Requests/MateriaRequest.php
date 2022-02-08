<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class MateriaRequest extends FormRequest
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
        switch($this->method()){
            case 'POST':
            {
                return [
  
                    'mat_nombre' => [
                        'required', 'min:5','max:100','unique:mat_materia'
                    ],
                    // 'clave_sat' => [
                    //     'required', 'min:3'
                    // ],
                ];
            }
            case 'PUT':
            {
                return [
                    'mat_nombre' => [
                        'required', 'min:5','max:100',Rule::unique('mat_materia')->ignore($this->id_validate,"mat_id"),
                    ],
                ];
            }
            default:break;
        }
    }
    public function attributes()
    {
        return [
                'mat_nombre' => 'nombre',
        ];

    }
}
