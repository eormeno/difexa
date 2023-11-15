<?php

namespace App\Http\Requests;

use App\Models\Tema;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $temasValidos = Tema::pluck('id')->all();
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'documento' => ['required', 'string', 'max:20'],
            'tema' => ['required',Rule::in($temasValidos)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
