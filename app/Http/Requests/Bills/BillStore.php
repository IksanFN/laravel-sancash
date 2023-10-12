<?php

namespace App\Http\Requests\Bills;

use Illuminate\Foundation\Http\FormRequest;

class BillStore extends FormRequest
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
            'kelas' => ['required'],
            'week' => ['required', 'in:firstWeek,secondWeek,thirdWeek,fourthWeek'],
            'month' => ['required'],
            'year' => ['required'],
            'start_of_date' => ['required', 'date'],
            'end_of_date' => ['required', 'date'],
            'bill' => ['required', 'numeric'],
        ];
    }
}
