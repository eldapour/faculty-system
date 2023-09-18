<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternalAdUpdateRequest extends FormRequest
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
        "title.ar" => 'required',
        "title.en" => 'required',
        "title.fr" => 'required',
        "description.ar" => 'required',
        "description.en" => 'required',
        "description.fr" => 'required',
        "time_ads" => 'required',
        "url_ads" => 'nullable|file|mimetypes:application/pdf',
        "service_id" => 'required|exists:services,id',
    ];



    return $rules;
}

}
