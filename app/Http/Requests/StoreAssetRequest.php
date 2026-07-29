<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
            //
        'category_id' => 'required|exists:categories,id',

        'asset_code' => 'required|unique:assets|max:50',

        'name' => 'required|max:255',

        'serial_number' => 'required|unique:assets',

        'status' => 'required|in:Available,Assigned,Maintenance,Retired',

        'purchase_date' => 'required|date|before_or_equal:today',

        'cost' => 'required|numeric|min:0',

        ];
    }
    public function messages(): array
{
    return [
        'purchase_date.before_or_equal' => 'The purchase date cannot be a future date.',
    ];
}
}
