<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInternalAd extends FormRequest
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
            "title_ar" => 'required',
            "title_en" => 'required',
            "title_fr" => 'required',
            "description_ar" => 'required',
            "description_en" => 'required',
            "description_fr" => 'required',
            "time_ads" => 'required',
            "url_ads" => 'required|mimes:png,jpg',
            "service_id" => 'required|exists:services,id',
        ];
    }
}
