<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name_latin' => 'required',
            'last_name_latin' => 'required',
            'email' => 'required|unique:users,email',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'university_email' => 'required|unique:users,university_email',
            'identifier_id' => 'required|unique:users,identifier_id',
            'national_id' => 'required|unique:users,national_id',
            'national_number' => 'required|unique:users,national_number',
            'birthday_date' => 'required|date_format:Y-m-d',
            'birthday_place' => 'required',
            'city_ar' => 'required',
            'city_latin' => 'required',
            'address' => 'required',
            'student_type_id' => 'required',
            'country_address_ar' => 'required',
            'country_address_latin' => 'required',
            'university_register_year' => 'required',
        ];
    }
}
