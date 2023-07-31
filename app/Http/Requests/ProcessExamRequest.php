<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessExamRequest extends FormRequest
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
            'attachment_file' => 'required',
            'period' => 'required',
            'year' => 'required',
            'reason' => 'required',
        ];
    }
}
