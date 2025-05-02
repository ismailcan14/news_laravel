<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
    public function messages(): array
{
    return [
        // email
        'email.required' => 'E-posta alanı boş bırakılamaz.',
        'email.email' => 'Geçerli bir e-posta adresi girilmelidir.',

        // password
        'password.required' => 'Şifre alanı boş bırakılamaz.',
        'password.string' => 'Şifre metin formatında olmalıdır.',
        'password.min' => 'Şifre en az 6 karakter olmalıdır.',
        'password.max' => 'Şifre en fazla 255 karakter olabilir.',
    ];
}
}
