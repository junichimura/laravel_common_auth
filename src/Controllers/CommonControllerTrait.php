<?php

namespace Junichimura\LaravelCommonAuth\Controllers;

use Illuminate\Contracts\Auth\Guard;

trait CommonControllerTrait
{
    /**
     * @var Guard
     */
    private $guard;

    protected function getGuard()
    {
        if (!$this->guard) {
            $guard = config('auth.defaults.guard');
            $this->guard = auth()->guard($guard);
        }
        return $this->guard;
    }

    protected function redirectTo($configKey)
    {
        if ($name = config($configKey.'.name')) {
            return redirect()->route($name);
        }
        return redirect()->to(config($configKey.'.path'));
    }
}