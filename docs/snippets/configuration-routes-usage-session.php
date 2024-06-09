<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\SessionLocale;

app('router')
    ->middleware(SessionLocale::class)
    ->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
