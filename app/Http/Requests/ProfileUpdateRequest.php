<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'apellido' => ['required', 'string', 'min:2', 'max:15'],
            'nombre' => ['required', 'string', 'min:2', 'max:25'],
            'documento' => ['required', 'string', 'min:7', 'max:10', 'regex:/^[0-9]+%/'],
            'tema' => ['required', 'string', 'max:50'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
