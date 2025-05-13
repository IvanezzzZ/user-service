<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }
}
