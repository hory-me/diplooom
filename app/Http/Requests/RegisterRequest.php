<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'surname' => ['required', 'string', 'min:2', 'max:30', 'regex:/^[А-ЯЁA-Z][а-яёa-z\'-]+$/u'],
            'name' => ['required', 'string', 'min:2', 'max:30', 'regex:/^[А-ЯЁA-Z][а-яёa-z\'-]+$/u'],
            'login' => ['required', 'min:8', 'unique:users,login'],
            //'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/']
        ];
    }

    public function attributes(): array
    {
        return [
            'surname' => 'фамилия',
            'name' => 'имя',
            'email' => 'почта',
            'login' => 'логин',
            'password' => 'пароль',
            'name.regex' => 'Имя должно начинаться с заглавной буквы и содержать только буквы и апострофы',
            'surname.regex' => 'Фамилия должна начинаться с заглавной буквы и содержать только буквы и апострофы',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Пароль должен содержать хотя бы одну букву, одну цифру и один спецсимвол',
            'name.regex' => 'Имя должно начинаться с заглавной буквы и содержать только буквы',
            'surname.regex' => 'Фамилия должна начинаться с заглавной буквы и содержать только буквы'
        ];
    }
}
