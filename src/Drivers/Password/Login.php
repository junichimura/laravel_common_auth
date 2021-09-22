<?php

namespace Junichimura\LaravelCommonAuth\Drivers\Password;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Junichimura\LaravelCommonAuth\Drivers\LoginDriverInterface;

class Login implements LoginDriverInterface
{
    public function validateParams(Request $request)
    {
        return $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);
    }

    public function checkCredentials($credentials)
    {
        $user = User::where('email', $credentials['user_id'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            return $user;
        }
        return;
    }
}