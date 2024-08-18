<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [

            'register_name'     => 'bail|string|required|max:255',
            'register_number'   => 'bail|string|required|max:15',
            'register_email'    => 'bail|email|required|unique:users,email',
            'register_password' => 'bail|required|string|min:4',

        ];
    }
}
