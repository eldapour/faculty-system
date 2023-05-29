<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversitySettingRequest extends FormRequest
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
            'email' => 'required|email',
            'logo' => 'required|image',
            'title.ar' => 'required',
            'title.en' => 'required',
            'title.fr' => 'required',
            'description.ar' => 'required',
            'description.en' => 'required',
            'description.fr' => 'required',
            'address.ar' => 'required',
            'address.en' => 'required',
            'address.fr' => 'required',
            'facebook_link' => 'required'
        ];
    }
}
