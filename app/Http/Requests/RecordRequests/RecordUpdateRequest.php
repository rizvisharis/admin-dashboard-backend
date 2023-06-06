<?php

namespace App\Http\Requests\RecordRequests;

use Illuminate\Foundation\Http\FormRequest;

class RecordUpdateRequest extends FormRequest
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
            'username' => 'sometimes|min:1|max:255|unique:records,username,' . $this->id,
            'full_name' => 'sometimes|min:1|max:255',
            'gender' => 'sometimes|in:male,female',
            'profile_photo' => 'sometimes|image|mimes:jpeg,jpg,png,gif|max:5120',
        ];
    }
}
