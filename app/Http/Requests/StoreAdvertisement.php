<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertisement extends FormRequest
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
                'title_ar' => 'required',
                'title_en' => 'required',
                'title_fr' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'description_fr' => 'required',
                'image' => 'required|image',
                'background_image' => 'required|image',
                'category_id' => 'required',
                'service_id' => 'required'
            ];

        }elseif (request()->isMethod('PUT')) {

            $rules = [
                'title_ar' => 'required',
                'title_en' => 'required',
                'title_fr' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'description_fr' => 'required',
                'image' => 'nullable|image',
                'background_image' => 'nullable|image',
                'category_id' => 'required',
                'service_id' => 'required'

            ];
        }

        return $rules;
    }
}
