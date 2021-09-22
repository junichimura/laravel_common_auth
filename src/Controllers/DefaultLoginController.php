<?php

namespace Junichimura\LaravelCommonAuth\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Junichimura\LaravelCommonAuth\Drivers\LoginDriverInterface;

class DefaultLoginController extends AbstractLoginController
{
    public function login(Request $request)
    {
        $driverClass = config('laravel_common_auth.driver.login');

        /* @var LoginDriverInterface $driver */
        $driver = new $driverClass();

        // リクエスト内容をヴァリデーション
        $credentials = $driver->validateParams($request);


        // 認証情報のチェックを行う
        /* @var Model $user */
        if (!($user = $driver->checkCredentials($credentials))) {
            // 認証情報不一致時の処理
            $failMessage = __('laravel_common_auth::login.fail_message');
            $validator = Validator::make($credentials, [
                'user_id' => [
                    function ($attribute, $value, $fail) use ($failMessage) {
                        $fail($failMessage);
                    }
                ],
                'password' => [
                    function ($attribute, $value, $fail) use ($failMessage) {
                        $fail($failMessage);
                    }
                ],
            ]);
            throw new ValidationException($validator);
        }

        // ログイン
        $this->getGuard()->login($user, (bool)$request->post('remember_me', false));

        // ログイン完了後のリダイレクト
        return $this->redirectTo('laravel_common_auth::laravel_common_auth.redirect_to.login');
    }
}