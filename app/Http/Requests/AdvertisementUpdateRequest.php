<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementUpdateRequest extends FormRequest
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
        $rules = [
            'title_ar' => 'required',
            'title_en' => 'required',
            'title_fr' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'description_fr' => 'required',
            'category_id' => 'required',
            'service_id' => 'required'
        ];

        if ($this->hasFile('image')) {
            $rules['image'] .= '|mimes:png,jpg';
        }
        if ($this->hasFile('background_image')) {
            $rules['background_image'] .= '|mimes:png,jpg';
        }

        return $rules;
    }
}
