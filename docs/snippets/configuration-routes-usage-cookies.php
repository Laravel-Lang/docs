<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByCookie;

app('router')
    ->middleware(LocalizationByCookie::class)
    ->get('some', fn () => response()->json(__('Foo')));
