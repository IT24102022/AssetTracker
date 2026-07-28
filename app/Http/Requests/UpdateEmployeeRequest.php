<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'emp_code' => [
            'required',
            Rule::unique('employees')->ignore($this->employee),
        ],
        'email' => [
            'required',
            'email',
            Rule::unique('employees')->ignore($this->employee),
        ],
        'name' => 'required|max:255',
        'department' => 'required|max:255',
        'is_active' => 'required|boolean',
        ];
    }
}
