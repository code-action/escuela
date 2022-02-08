<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class GradoRequest extends FormRequest
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
  
                    'grd_nombre' => [
                        'required', 'min:5','max:100','unique:grd_grado'
                    ],
                    // 'clave_sat' => [
                    //     'required', 'min:3'
                    // ],
                ];
            }
            case 'PUT':
            {
                return [
                    'grd_nombre' => [
                        'required', 'min:5','max:100',Rule::unique('grd_grado')->ignore($this->id_validate,"grd_id"),
                    ],
                ];
            }
            default:break;
        }
    }
    public function attributes()
    {
        return [
                'grd_nombre' => 'nombre',
        ];

    }
}
