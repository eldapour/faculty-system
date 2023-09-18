<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
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
            'email' => 'required|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name_latin' => 'required',
            'last_name_latin' => 'required',
            'password' => 'required|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'user_type' => 'required|in:manger,employee,factor',
            'job_id' => 'nullable|unique:users,job_id',
        ];
    }
}
