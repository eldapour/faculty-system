<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
    $userId = request()->id; // Assuming the parameter name is 'id'
    return [
        'first_name' => 'required',
        'last_name' => 'required',
        'first_name_latin' => 'required',
        'last_name_latin' => 'required',
        'email' => 'required|unique:users,email,' . $userId,
        'password' => 'nullable|min:6',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        'university_email' => 'nullable|unique:users,university_email,' . $userId,
        'identifier_id' => 'nullable|unique:users,identifier_id,' . $userId,
        'national_id' => 'required|unique:users,national_id,' . $userId,
        'national_number' => 'nullable|unique:users,national_number,' . $userId,
        'birthday_date' => 'nullable|date_format:Y-m-d',
        'birthday_place' => 'required',
        'city_ar' => 'required',
        'city_latin' => 'required',
        'address' => 'required',
        'student_type_id' => 'required',
        'country_address_ar' => 'required',
        'country_address_latin' => 'required',
        'university_register_year' => 'nullable'
    ];
}


}
