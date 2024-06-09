<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\ParameterRedirectLocale;
use LaravelLang\Routes\Middlewares\SessionLocale;

app('router')
    ->middleware(ParameterRedirectLocale::class)
    ->get('some/{foo}/bar/{locale?}', function (string $foo) {
        return response()->json([
            $foo => __('Foo'),
        ]);
    });
