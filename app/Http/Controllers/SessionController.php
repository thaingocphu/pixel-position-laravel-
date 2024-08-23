<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }
    public function store(Request $request)
    {
        $userAttributes = request()->validate([
            "email"=> ["required", 'email'],
            "password"=> ["required", Password::min(6)],
        ]);

        if(!Auth::attempt($userAttributes)) {
            throw ValidationException::withMessages([
                "email" => "Sorry, those credentials do not match."
            ]);
        }

        request()->session()->regenerate();

        return redirect()->route("jobs.index");


    }
    public function destroy(string $id)
    {
        Auth::logout();
        return redirect()->route("jobs.index");
    }
}
