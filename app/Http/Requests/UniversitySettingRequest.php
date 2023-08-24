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
        return [
            'email' => 'required|email',
            'logo' => 'nullable',
            'stamp_logo' => 'nullable|mimes:png',
            'title_ar' => 'required',
            'title_en' => 'required',
            'title_fr' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'description_fr' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
            'address_fr' => 'required',
            'facebook_link' => 'required',
            'whatsapp_link' => 'required',
            'youtube_link' => 'required',
            'reregister_start' => 'required',
            'reregister_end' => 'required',
            'phone' => 'required',
        ];
    }
}
