<?php

namespace ProjetoDigital\Http;

use ProjetoDigital\Http\Middleware\Backend;
use ProjetoDigital\Http\Middleware\Customer;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use ProjetoDigital\Http\Middleware\SanitizeCpfAndCnpj;
use ProjetoDigital\Http\Middleware\RedirectIfFullRegistered;
use ProjetoDigital\Http\Middleware\RedirectIfNotFullRegistered;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \ProjetoDigital\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \ProjetoDigital\Http\Middleware\TrustProxies::class,
        SanitizeCpfAndCnpj::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \ProjetoDigital\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \ProjetoDigital\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],

        'backend' => [
            Backend::class,
            RedirectIfNotFullRegistered::class,
        ],

        'customer' => [
            Customer::class,
            RedirectIfNotFullRegistered::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \ProjetoDigital\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'not-full-registered' => RedirectIfFullRegistered::class,
    ];
}
