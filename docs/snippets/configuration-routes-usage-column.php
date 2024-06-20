<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByModel;

app('router')
    ->middleware(LocalizationByModel::class)
    ->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
