<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElementRequest extends FormRequest
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
            'element_code' => 'required',
            'name_ar' => 'required',
            'name_latin' => 'required',
            'session_name' => 'required',
            'department_id' => 'required',
        ];

    }
}
