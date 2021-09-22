<?php

namespace Junichimura\LaravelCommonAuth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class AbstractRegisterController extends Controller
{
    use CommonControllerTrait;

    /**
     * 登録画面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderRegister()
    {
        return view('laravel_common_auth::register');
    }

    /**
     * 登録処理
     * @param Request $request
     * @return mixed
     */
    abstract public function register(Request $request);
}