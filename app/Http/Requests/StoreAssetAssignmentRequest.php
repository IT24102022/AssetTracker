<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'asset_id' => 'required|exists:assets,id',
        'employee_id' => 'required|exists:employees,id',

        'assigned_at' => [
            'required',
            'date',
            'before_or_equal:today',
        ],

        'notes' => 'nullable|string|max:1000',
    ];
}
}