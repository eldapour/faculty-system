<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeadLineUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'deadline_date_start' => 'required|date',
            'deadline_date_end' => 'required|date|after:deadline_date_start',
            'year' => 'required|after_or_equal:1900',
            'period' => 'required',
            'deadline_type' => 'required',
        ];
    }
}
