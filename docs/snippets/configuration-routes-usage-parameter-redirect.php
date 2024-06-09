<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByParameterWithRedirect;
use LaravelLang\Routes\Middlewares\LocalizationBySession;

app('router')
    ->middleware(LocalizationByParameterWithRedirect::class)
    ->get('some/{foo}/bar/{locale?}', function (string $foo) {
        return response()->json([
            $foo => __('Foo'),
        ]);
    });
