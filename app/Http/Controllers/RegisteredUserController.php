<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\Rules\File as RulesFile;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        $userAttributes = request()->validate([
            "name"=> ["required"],
            "email"=> ["required","email", "unique:users,email"],
            "password"=>["required", Password::min(8), 'confirmed'],
        ]);

        $employerAttributes = request()->validate([
            "employer"=> ["required"],
            "logo"=> ["required", RulesFile::types(["png", 'jpg', 'webp'])],
            ]);

            $user = User::create($userAttributes);

            $logoPath = $request->logo->store('logos');

            $user->employer()->create([
                'name'=> $employerAttributes['employer'],
                'logo'=> $logoPath,
            ]);

            FacadesAuth::login($user);

            return redirect()->route('jobs.index');
    }
}
