<?php

declare(strict_types=1);

// app/Http/Kernel.php

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use LaravelLang\Routes\Middlewares\LocalizationByCookie;
use LaravelLang\Routes\Middlewares\LocalizationByHeader;
use LaravelLang\Routes\Middlewares\LocalizationByParameter;
use LaravelLang\Routes\Middlewares\LocalizationByParameterWithRedirect;
use LaravelLang\Routes\Middlewares\LocalizationBySession;

class Kernel extends HttpKernel
{
    protected $middlewareAliases = [
        // ...

        'localization.parameter'          => LocalizationByParameter::class,
        'localization.parameter.redirect' => LocalizationByParameterWithRedirect::class,
        'localization.header'             => LocalizationByHeader::class,
        'localization.cookie'             => LocalizationByCookie::class,
        'localization.session'            => LocalizationBySession::class,
    ];
}
