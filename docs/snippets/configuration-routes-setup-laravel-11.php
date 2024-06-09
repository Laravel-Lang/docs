<?php

declare(strict_types=1);

// bootstrap/app.php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use LaravelLang\Routes\Middlewares\LocalizationByCookie;
use LaravelLang\Routes\Middlewares\LocalizationByHeader;
use LaravelLang\Routes\Middlewares\LocalizationByParameter;
use LaravelLang\Routes\Middlewares\LocalizationByParameterWithRedirect;
use LaravelLang\Routes\Middlewares\LocalizationBySession;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'localization.parameter'          => LocalizationByParameter::class,
            'localization.parameter.redirect' => LocalizationByParameterWithRedirect::class,
            'localization.header'             => LocalizationByHeader::class,
            'localization.cookie'             => LocalizationByCookie::class,
            'localization.session'            => LocalizationBySession::class,
        ]);
    });
