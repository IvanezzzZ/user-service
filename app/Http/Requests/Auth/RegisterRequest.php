<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->whereNull('deleted_at'),],
            'password' => ['required', 'string', 'confirmed', 'min:8', 'max:255'],
            'name' => ['string', 'max:32'],
            'surname' => ['string', 'max:32'],
            'patronymic' => ['string', 'max:32'],
        ];
    }
}
