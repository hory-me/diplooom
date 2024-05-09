<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $credentials = [
            'login' => $login,
            'password' => $password
        ];

        if (Auth::attempt($credentials, true)) {
            $user = Auth::user();
            if ($user->role === RoleEnum::USER->value) {
                return redirect()->route('user');
            }
            if ($user->role === RoleEnum::ADMIN->value)
                return redirect()->route('user');
        }

        return redirect()->back()->withErrors(['error' => 'Неверный логин или пароль. Повторите попытку']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
