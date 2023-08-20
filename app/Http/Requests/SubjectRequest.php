<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
                'subject_name_ar' => 'required',
                'subject_name_en' => 'required',
                'subject_name_fr' => 'required',
                'code' => 'required|unique:subjects,code',
                'group_id' => 'nullable|exists:groups,id',
                'department_id' => 'required|exists:departments,id',
                'department_branch_id' => 'required|exists:department_branches,id',
                'unit_id' => 'required|exists:units,id',
            ];
        } elseif (request()->isMethod('PUT')) {
            $rules = [
                'subject_name_ar' => 'required',
                'subject_name_en' => 'required',
                'subject_name_fr' => 'required',
                'code' => 'required|unique:subjects,code,'. request()->id,
            ];
        }

        return $rules;


    }
}
