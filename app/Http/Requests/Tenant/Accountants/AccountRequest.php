<?php

namespace App\Http\Requests\Tenant\Accountants;

use App\Enums\AccountClassificationType;
use App\Enums\AccountSubClassificationType;
use App\Enums\ActivityType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class AccountRequest extends FormRequest
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
            'account_code' => 'nullable|string|unique:accounts,account_code',
            'classification' => [
                'nullable',
                'string',
            ],
            'name_ar' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'activity' => 'nullable',
            'parent_id' => 'nullable|exists:accounts,id',
            'show_in_expense_claims' => 'nullable',
            'bank_id' => 'nullable',
            'is_bank' => 'nullable',
            'is_locked' => 'nullable',
            'lock_reason' => 'nullable|string|max:255',
            'is_system' => 'nullable',
            'is_payment_enabled' => 'nullable',
        ];
    }
}
