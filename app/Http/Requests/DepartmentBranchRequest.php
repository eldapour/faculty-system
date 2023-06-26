<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentBranchRequest extends FormRequest
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
                'branch_name_ar' => 'required',
                'branch_name_en' => 'required',
                'branch_name_fr' => 'required',
                'department_id' => 'required|exists:departments,id',
                'department_branch_code' => 'required|unique:department_branches,department_branch_code',
            ];

        }elseif (request()->isMethod('PUT')) {

            $rules = [
                'branch_name_ar' => 'required',
                'branch_name_en' => 'required',
                'branch_name_fr' => 'required',
                'department_id' => 'required|exists:departments,id',
                'department_branch_code' => 'required|unique:department_branches,department_branch_code,'. request()->id,
            ];
        }

        return $rules;
    }
}
