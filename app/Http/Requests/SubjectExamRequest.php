<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectExamRequest extends FormRequest
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
            'department_id' => 'required',
            'department_branch_id' => 'required',
            'exam_date' => 'required|date',
            'exam_day' => 'required',
            'year' => 'required',
            'period' => 'required',
            'session' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'group_id' => 'required',
            'subject_id' => 'required'
        ];
    }
}
