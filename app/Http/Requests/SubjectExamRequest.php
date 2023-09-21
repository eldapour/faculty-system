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


        if (request()->isMethod('post')) {

            $rules = [
                'exam_code' => 'required|unique:subject_exams,exam_code',
                'exam_date' => 'required|date',
                'exam_day' => 'required',
                'year' => 'required',
                'period' => 'required',
                'session' => 'required',
                'time_start' => 'required',
                'time_end' => 'required',
                'subject_id' => 'required'

            ];

        }elseif (request()->isMethod('PUT')) {

            $rules = [
                'exam_code' => 'required|unique:subject_exams,exam_code,' . request()->id,
                'exam_date' => 'required|date',
                'exam_day' => 'required',
                'year' => 'required',
                'period' => 'required',
                'session' => 'required',
                'time_start' => 'required',
                'time_end' => 'required',
                'subject_id' => 'required'

            ];
        }

        return $rules;
    }
}
