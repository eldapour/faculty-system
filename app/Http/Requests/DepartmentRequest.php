<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'department_name_ar' => 'required',
            'department_name_en' => 'required',
            'department_name_fr' => 'required',
            'department_code_ar' => 'required',
            'department_code_en' => 'required',
            'department_code_fr' => 'required',
        ];
    }
}
