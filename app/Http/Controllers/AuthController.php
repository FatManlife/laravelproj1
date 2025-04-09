<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login_view()
    {
        return view("auth.login");
    }

    public function login_action(Request $req)
    {
        $validate = $req->validate([
            "email" => "required|string|email|max:255",
            "password" => "required|string|min:2|max:25"
        ]);
        if (Auth::attempt($validate)) {
            $req->session()->regenerate();
            return redirect()->route("posts.index.view");
        }

        throw ValidationException::withMessages(['message' => "Wrong Credentials"]);
    }

    public function register_view()
    {
        return view("auth.register");
    }

    public function register_action(Request $req)
    {
        $validate = $req->validate([
            "name" => "required|string|min:2|max:25",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:2|max:25|confirmed",
            "password_confirmation" => "required|string"
        ]);

        User::create(
            [
                'name' => $validate['name'],
                'email' => $validate['email'],
                'password' => Hash::make($validate["password"],)
            ]
        );

        return redirect()->route("login.view");
    }

    public function logout_action(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerate();
        return redirect()->route("login.view");
    }
}
