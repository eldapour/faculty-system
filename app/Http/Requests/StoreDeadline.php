<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeadline extends FormRequest
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
            'deadline_date_start' => 'required|date',
            'deadline_date_end' => 'required|date|after:deadline_date_start',
            "description_ar" => "required",
            "description_en" => "required",
            "description_fr" => "required",

        ];
    }
}
