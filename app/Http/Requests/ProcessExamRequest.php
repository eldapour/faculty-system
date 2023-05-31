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
            'user_id' => 'required',
            'attachment_file' => 'required',
            'period' => 'required',
            'year' => 'required',
            'request_date' => 'required|date',
            'request_status' => 'required',
            'processing_request_date' => 'required|date',
            'reason' => 'required',
        ];
    }
}
