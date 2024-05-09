<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        User::create([
            'password' => Hash::make($request->password),
            'role' => RoleEnum::USER->value
        ] + $request->except('password_confirmation'));
        return redirect()->route('login');
    }
}
