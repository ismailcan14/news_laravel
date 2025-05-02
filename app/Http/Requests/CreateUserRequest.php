<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //default olarak false geliyor true ya ceviriyoruz.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           
                'name'=>'required|min:3|max:255',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:3|max:255'
            
        ];
    }

    public function messages(): array
    {
        return [
            // name
            'name.required' => 'Ad alanı boş bırakılamaz.',
            'name.string'   => 'Ad alanı metin halinde olmalıdır.',
            'name.min'      => 'Ad en az 3 karakter olmalıdır.',
            'name.max'      => 'Ad en fazla 255 karakter olmalıdır.',
    
            // email
            'email.required' => 'Email alanı boş bırakılamaz.',
            'email.email'    => 'Geçerli bir email adresi girilmelidir.',
            'email.unique'   => 'Bu email adresi zaten kayıtlı.',
    
            // password
            'password.required' => 'Şifre alanı boş bırakılamaz.',
            'password.string'   => 'Şifre metin halinde olmalıdır.',
            'password.min'      => 'Şifre en az 3 karakter olmalıdır.',
            'password.max'      => 'Şifre en fazla 255 karakter olmalıdır.',
        ];
    }
}
