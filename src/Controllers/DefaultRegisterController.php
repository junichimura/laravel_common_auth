<?php

namespace Junichimura\LaravelCommonAuth\Controllers;

use Illuminate\Http\Request;
use Junichimura\LaravelCommonAuth\Drivers\RegisterDriverInterface;

class DefaultRegisterController extends AbstractRegisterController
{
    public function register(Request $request)
    {
        $driverClass = config('laravel_common_auth.driver.register');

        /* @var RegisterDriverInterface $driver */
        $driver = new $driverClass();

        // ユーザ作成
        $user = $driver->createUser($driver->validateParams($request));

        // ログイン
        $this->getGuard()->login($user);

        // リダイレクト
        return $this->redirectTo('laravel_common_auth::laravel_common_auth.redirect_to.register');
    }
}