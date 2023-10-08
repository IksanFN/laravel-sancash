<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentUpdate extends FormRequest
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
            'uuid' => [Rule::unique('students', 'uuid')->ignore($this->student->uuid, 'uuid')],
            'user_id' => ['required', Rule::unique('students', 'user_id')->ignore($this->student->uuid, 'uuid')],
            'major_id' => ['required', Rule::unique('students', 'major_id')->ignore($this->student->uuid, 'uuid')],
            'group_id' => ['required', Rule::unique('students', 'group_id')->ignore($this->student->uuid, 'uuid')],
            'gender' => ['required', 'in:Male,Female'],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'address' => ['nullable', 'string'],
        ];
    }
}
