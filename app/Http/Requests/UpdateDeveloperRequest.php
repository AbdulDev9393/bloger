<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enums\DeveloperRoleEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDeveloperRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('id');
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($userId)],
            'password' => ['nullable', 'min:6'],
            'role' => ['required', new Enum(DeveloperRoleEnum::class)],
        ];
    }
}
