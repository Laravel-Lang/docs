<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByModel;

app('router')
    ->middleware(LocalizationByModel::class . ':guard_name')
    ->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
