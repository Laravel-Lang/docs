<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByHeader;

app('router')
    ->middleware(LocalizationByHeader::class)
    ->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
