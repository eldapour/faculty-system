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
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_fr' => 'required',
            'period' => 'required',
            'department_branch_id' => 'required',
        ];
    }
}
