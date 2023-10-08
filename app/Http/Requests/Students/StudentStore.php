<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StudentStore extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'unique:students'],
            'major_id' => ['required'],
            'group_id' => ['required'],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'gender' => ['required', 'in:Male,Female'],
            'address' => ['nullable', 'string'],
        ];
    }
}
