<?php

    namespace App\Http\Requests\Central\User;

    use Illuminate\Foundation\Http\FormRequest;

    class RegisterRequest extends FormRequest
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
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ];
        }

        public function messages(): array
        {
            return [
                'phone.unique' => 'رقم الجوال الذي أدخلته مستخدم من قبل.',
                'email.unique' => 'البريد الإلكتروني الذي أدخلته مستخدم من قبل.'
            ];
        }
    }
