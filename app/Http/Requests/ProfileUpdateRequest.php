<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Tema;
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
        $temasValidos = Tema::pluck('id')->all();
        return [
            'apellido' => ['required','string', 'max:255'],
            'nombre' => ['required','string', 'max:255'],
            'documento' => ['required','string','max:20'],
            'tema' => ['required',Rule::in($temasValidos)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
