<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
  
                    'alm_codigo' => [
                        'required','size:5','unique:alm_alumno'
                    ],
                    'alm_nombre' => [
                        'required', 'min:5','max:100',
                    ],
                    'alm_edad' => [
                        'required', 'integer',
                    ],
                    'alm_sexo' => [
                        'required',
                    ],
                    'alm_id_grd' => [
                        'required',
                    ],
                    'alm_observacion' => [
                        'required','min:5','max:100',
                    ],
                ];
            }
            case 'PUT':
            {
                return [
                    'alm_codigo' => [
                        'required','size:5',Rule::unique('alm_alumno')->ignore($this->id_validate,"alm_id"),
                    ],
                    'alm_nombre' => [
                        'required', 'min:5','max:100',
                    ],
                    'alm_edad' => [
                        'required', 'integer',
                    ],
                    'alm_sexo' => [
                        'required',
                    ],
                    'alm_id_grd' => [
                        'required',
                    ],
                    'alm_observacion' => [
                        'required','min:5','max:100',
                    ],
                ];
            }
            default:break;
        }
    }
    public function attributes()
    {
        return [
                'alm_codigo' => 'código',
                'alm_nombre' => 'nombre',
                'alm_edad' => 'edad',
                'alm_sexo' => 'sexo',
                'alm_id_grd' => 'grado',
                'alm_observacion' => 'observación',

        ];

    }
}
