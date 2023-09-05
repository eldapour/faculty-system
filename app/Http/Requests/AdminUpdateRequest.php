<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
    $adminId = $this->route('admin'); // Assuming the route parameter for admin ID is 'admin'

    return [
        'email' => 'required|unique:users,email,' . $adminId,
        'first_name' => 'required',
        'last_name' => 'required',
        'first_name_latin' => 'required',
        'last_name_latin' => 'required',
        'password' => 'nullable|min:6',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        'user_type' => 'required',
        'job_id' => 'nullable|unique:users,job_id,' . $adminId,
    ];
}
}
