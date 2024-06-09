<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByParameter;

app('router')
    ->middleware(LocalizationByParameter::class)
    ->get('foo/{locale}/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
