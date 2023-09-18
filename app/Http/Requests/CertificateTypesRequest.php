<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateTypesRequest extends FormRequest
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
                'certificate_type_ar' => 'required',
                'certificate_type_en' => 'required',
                'certificate_type_fr' => 'required',
                'code' => 'required|unique:certificate_types,code',
            ];

        }elseif (request()->isMethod('PUT')) {

            $rules = [
                'certificate_type_ar' => 'required',
                'certificate_type_en' => 'required',
                'certificate_type_fr' => 'required',
                'code' => 'required|unique:certificate_types,code,'. request()->id,
            ];
        }

        return $rules;

    }
}
