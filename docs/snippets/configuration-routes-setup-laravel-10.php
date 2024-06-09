<?php

declare(strict_types=1);

// app/Http/Kernel.php

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use LaravelLang\Routes\Middlewares\CookiesLocale;
use LaravelLang\Routes\Middlewares\HeaderLocale;
use LaravelLang\Routes\Middlewares\ParameterLocale;
use LaravelLang\Routes\Middlewares\ParameterRedirectLocale;
use LaravelLang\Routes\Middlewares\SessionLocale;

class Kernel extends HttpKernel
{
    protected $middlewareAliases = [
        // ...

        'localization.parameter'          => ParameterLocale::class,
        'localization.parameter.redirect' => ParameterRedirectLocale::class,
        'localization.header'             => HeaderLocale::class,
        'localization.cookie'             => CookiesLocale::class,
        'localization.session'            => SessionLocale::class,
    ];
}
