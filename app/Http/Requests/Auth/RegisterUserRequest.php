<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $name = trim((string) $this->input('name', ''));
        $email = strtolower(trim((string) $this->input('email', '')));
        $phone = trim((string) $this->input('phone', ''));

        $this->merge([
            'name' => $name,
            'email' => $email,
            'phone' => $phone === '' ? null : $phone,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:25', 'regex:/^[0-9+\s()\-]+$/'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
            'terms' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre completo es obligatorio.',
            'name.min' => 'El nombre completo debe tener al menos 3 caracteres.',
            'email.required' => 'El correo electronico es obligatorio.',
            'email.email' => 'Ingresa un correo electronico valido.',
            'email.unique' => 'Este correo ya esta registrado en GoldenWind.',
            'phone.regex' => 'El telefono solo puede contener numeros, espacios, parentesis, guiones y el simbolo +.',
            'password.required' => 'La contrasena es obligatoria.',
            'password.min' => 'La contrasena debe tener al menos 8 caracteres.',
            'password.regex' => 'La contrasena debe incluir al menos una mayuscula y un numero.',
            'password.confirmed' => 'La confirmacion de la contrasena no coincide.',
            'terms.accepted' => 'Debes aceptar los terminos y condiciones para crear tu cuenta.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre completo',
            'email' => 'correo electronico',
            'phone' => 'telefono',
            'password' => 'contrasena',
            'terms' => 'terminos y condiciones',
        ];
    }
}
