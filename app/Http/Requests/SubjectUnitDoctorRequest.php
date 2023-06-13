<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectUnitDoctorRequest extends FormRequest
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
                'year' => 'required',
                'user_id' => 'required',
                'subject_id' => 'required',
                'period' => 'required'
            ];
        } elseif (request()->isMethod('PUT')) {
            $rules = [
                'year' => 'required',
            ];
        }

        return $rules;
    }
}
