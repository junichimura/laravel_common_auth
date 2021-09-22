<?php

namespace Junichimura\LaravelCommonAuth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

abstract class AbstractLoginController extends Controller
{
    use CommonControllerTrait;

    /**
     * ログイン画面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderLogin()
    {
        return view('laravel_common_auth::login');
    }

    /**
     * ログイン処理
     * @param Request $request
     * @return mixed
     */
    abstract public function login(Request $request);

    public function logout()
    {
        $this->getGuard()->logout();
        return $this->redirectTo('laravel_common_auth::laravel_common_auth.redirect_to.logout');
    }
}