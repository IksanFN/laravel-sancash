<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'nisn' => ['required', 'unique:users', 'numeric'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
            'position' => ['required', 'in:admin,teacher,treasurer,student'],
        ];
    }
}
