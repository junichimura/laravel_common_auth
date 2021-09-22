<?php

namespace Junichimura\LaravelCommonAuth\Drivers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

/**
 * ログイン認証ドライバインターフェース
 * Interface AuthenticateDriverInterface
 * @package Junichimura\LaravelCommonAuth\Drivers
 */
interface RegisterDriverInterface
{
    /**
     * リクエスト内容のヴァリデーションを行う
     * このメソッドの戻り値がcreateUserメソッドの$paramsになる。
     * @param Request $request
     * @return array
     */
    public function validateParams(Request $request);

    /**
     * バリデーション後のパラメータを元にユーザを作成し返却する
     * @param array $params
     * @return Authenticatable|null
     */
    public function createUser($params);
}