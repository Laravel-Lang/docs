<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByCookie;

app('router')
    ->middleware(LocalizationByCookie::class)
    ->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
