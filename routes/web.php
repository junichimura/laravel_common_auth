<?php

use Illuminate\Support\Facades\Route;

Route::namespace('\Junichimura\LaravelCommonAuth\Controllers')
    ->middleware('web')
    ->group(function () {
    $config = config('laravel_common_auth.routes');

    Route::view('example', 'laravel_common_auth::register');

    /**
     * ログイン
     */
    if (in_array('render_login', $config)) {
        Route::get('login', 'DefaultLoginController@renderLogin')->name('login');
    }
    if (in_array('login', $config)) {
        Route::post('login', 'DefaultLoginController@login');
    }
    if (in_array('logout', $config)) {
        Route::post('logout', 'DefaultLoginController@logout')->name('logout');
    }

    /**
     * 登録
     */
    if (in_array('render_register', $config)) {
        Route::get('register', 'DefaultRegisterController@renderRegister')->name('register');
    }
    if (in_array('register', $config)) {
        Route::post('register', 'DefaultRegisterController@register');
    }
});