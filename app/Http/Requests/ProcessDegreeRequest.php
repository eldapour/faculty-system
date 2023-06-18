<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessDegreeRequest extends FormRequest
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
            'subject_id' => 'required',
            'doctor_id' => 'required',
            'period' => 'required',
            'year' => 'required',
            'section' => 'required',
            'exam_code' => 'required',
            'student_degree_before_request' => 'required',
            'request_type' => 'required',
            'student_degree_after_request' => 'nullable',
            'processing_date' => 'nullable',
        ];
    }
}
