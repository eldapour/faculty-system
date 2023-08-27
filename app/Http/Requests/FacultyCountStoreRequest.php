<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyCountStoreRequest extends FormRequest
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
            'title.ar' => 'required',
            'title.en' => 'required',
            'title.fr' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'count' => 'required|numeric',
        ];
    }
}
