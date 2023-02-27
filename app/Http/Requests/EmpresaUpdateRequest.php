<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'tipo' => ['required', 'in:fabricante,importador,distribuidor,expendedor'],
            'nombre' => ['required', 'string', 'max:40'],
            'cuit' => ['required', 'string', 'max:15'],
            'domicilio_empresa' => ['required', 'string', 'max:80'],
            'telefono_empresa' => ['required', 'string', 'max:15'],
            'titular' => ['required', 'string', 'max:40'],
            'dni_titular' => ['required', 'string', 'max:10'],
            'asesor' => ['required', 'string', 'max:40'],
            'matricula' => ['required', 'string', 'max:15'],
            'domicilio_asesor' => ['required', 'string', 'max:80'],
            'dni_asesor' => ['required', 'string', 'max:10'],
            'telefono_asesor' => ['required', 'string', 'max:15'],
        ];
    }
}
