<?php

    namespace App\Http\Requests\Tenant\Accounting\Sales;

    use Illuminate\Foundation\Http\FormRequest;

    class CreditNoteRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool
        {
            return false;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules(): array
        {
            return [
                //
            ];
        }
    }
