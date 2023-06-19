<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'unit_name_ar' => 'required',
            'unit_name_en' => 'required',
            'unit_name_fr' => 'required',
            'unit_code_ar' => 'required',
            'unit_code_en' => 'required',
            'unit_code_fr' => 'required',
        ];
    }
}
