<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationBySession;

app('router')
    ->middleware(LocalizationBySession::class)
    ->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
