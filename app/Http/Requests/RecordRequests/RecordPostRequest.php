<?php

namespace App\Http\Requests\RecordRequests;

use Illuminate\Foundation\Http\FormRequest;

class RecordPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:1|max:255|unique:records',
            'full_name' => 'required|min:1|max:255',
            'gender' => 'required|in:male,female',
            'profile_photo' => 'required|image|mimes:jpeg,jpg,png,gif|max:5120',
        ];
    }
}
