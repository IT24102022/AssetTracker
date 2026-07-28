<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAssetRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',

        'asset_code' => [
            'required',
            Rule::unique('assets')->ignore($this->asset),
        ],

        'serial_number' => [
            'required',
            Rule::unique('assets')->ignore($this->asset),
        ],

        'name' => 'required|max:255',

        'status' => 'required|in:Available,Assigned,Maintenance,Retired',

        'purchase_date' => 'required|date',

        'cost' => 'required|numeric|min:0',
        ];
    }
}
