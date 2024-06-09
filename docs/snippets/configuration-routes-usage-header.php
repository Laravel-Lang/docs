<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\HeaderLocale;

app('router')
    ->middleware(HeaderLocale::class)
    ->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
