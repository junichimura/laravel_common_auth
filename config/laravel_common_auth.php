<?php
return [

    'driver' => [
        // ログインドライバ
        'login' => \Junichimura\LaravelCommonAuth\Drivers\Password\Login::class,
        // ユーザ作成ドライバ
        'register' => \Junichimura\LaravelCommonAuth\Drivers\Password\Register::class,
    ],

    /**
     * 有効にするルーティング
     */
    'routes' => [
        'render_login',
        'login',
        'render_register',
        'register',
        'logout',
    ],

    /**
     * 処理が正常終了した後の遷移先
     */
    'redirect_to' => [
        'login' => [
            'name' => 'home',
            // or
            //'path' => '/home',
        ],
        'register' => [
            'name' => 'home',
            // or
            //'path' => '/home',
        ],
        'logout' => [
            'name' => 'login',
            // or
            //'path' => '/login',
        ],
    ],
];