<?php

namespace Junichimura\LaravelCommonAuth\Drivers\Password;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Junichimura\LaravelCommonAuth\Drivers\LoginDriverInterface;
use Junichimura\LaravelCommonAuth\Drivers\RegisterDriverInterface;

class Register implements RegisterDriverInterface
{
    public function validateParams(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:1|max:20',
            'user_id' => 'required',
            'password' => 'required',
        ]);
    }

    public function createUser($params)
    {
        return tap(new User([
            'name' => $params['name'],
            'email' => $params['user_id'],
            'password' => bcrypt($params['password']),
        ]), fn(User $u) => $u->save());
    }
}