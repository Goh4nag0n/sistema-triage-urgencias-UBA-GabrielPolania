<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTriageRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'patient_name' => ['required', 'string', 'max:150'],
            'manchester_color' => ['required', 'string'],
            'heart_rate' => ['nullable', 'integer', 'min:0', 'max:300'],
        ];
    }

    public function messages(): array
    {
        return [
            'patient_name.required' => 'El nombre del paciente es obligatorio.',
            'manchester_color.required' => 'Debe seleccionar un nivel de triage.',
        ];
    }
}
