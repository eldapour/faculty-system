<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyCountUpdateRequest extends FormRequest
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
            'count' => 'required|numeric',
        ];
        if ($this->hasFile('image')) {
            $rules['image'] = 'image|required';
        }
        return $rules;
    }
}
