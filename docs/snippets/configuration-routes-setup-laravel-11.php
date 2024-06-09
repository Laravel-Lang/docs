<?php

declare(strict_types=1);

// bootstrap/app.php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use LaravelLang\Routes\Middlewares\CookiesLocale;
use LaravelLang\Routes\Middlewares\HeaderLocale;
use LaravelLang\Routes\Middlewares\ParameterLocale;
use LaravelLang\Routes\Middlewares\ParameterRedirectLocale;
use LaravelLang\Routes\Middlewares\SessionLocale;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'localization.parameter'          => ParameterLocale::class,
            'localization.parameter.redirect' => ParameterRedirectLocale::class,
            'localization.header'             => HeaderLocale::class,
            'localization.cookie'             => CookiesLocale::class,
            'localization.session'            => SessionLocale::class,
        ]);
    });
