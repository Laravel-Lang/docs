<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\ParameterLocale;

app('router')
    ->middleware(ParameterLocale::class)
    ->get('foo/{locale}/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
