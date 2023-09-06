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
            "title.ar" => 'required',
            "title.en" => 'required',
            "title.fr" => 'required',
            "description.ar" => 'required',
            "description.en" => 'required',
            "description.fr" => 'required',
            "time_ads" => 'required',
            "url_ads" => 'required|file|mimetypes:application/pdf',
            "service_id" => 'required|exists:services,id',
        ];
    }
}
