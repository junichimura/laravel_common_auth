<?php

namespace Junichimura\LaravelCommonAuth\Drivers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

/**
 * ログイン認証ドライバインターフェース
 * Interface AuthenticateDriverInterface
 * @package Junichimura\LaravelCommonAuth\Drivers
 */
interface LoginDriverInterface
{
    /**
     * リクエスト内容のヴァリデーションを行う
     * このメソッドの戻り値がcheckCredentialsメソッドの$credentialsになる。
     * @param Request $request
     * @return array
     */
    public function validateParams(Request $request);

    /**
     * 認証情報が正当なものかをチェックし、問題なければログインユーザを返却する。
     * @param array $credentials
     * @return Authenticatable|null
     */
    public function checkCredentials($credentials);
}