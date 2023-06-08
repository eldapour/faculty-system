<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectExamStudentResultRequest extends FormRequest
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
            'student_degree' => 'required',
            'exam_degree' => 'required',
            'date_enter_degree' => 'required',
            'period' => 'required',
            'year' => 'required|date',
            'user_id' => 'required',
            'subject_id' => 'required'
        ];
    }
}
