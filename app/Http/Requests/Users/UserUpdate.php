<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdate extends FormRequest
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
            'uuid' => [Rule::unique('users', 'uuid')->ignore($this->user->uuid, 'uuid')],
            'avatar' => ['nullable', 'mimes:png,jpg,jpeg', 'image'],
            'nisn' => ['required', 'numeric', Rule::unique('users', 'nisn')->ignore($this->user->uuid, 'uuid')],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->uuid, 'uuid')],
            'password' => ['nullable', 'min:6'],
            'position' => ['required', 'in:admin,teacher,treasurer,student'],
        ];
    }
}
