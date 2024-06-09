<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\CookiesLocale;

app('router')
    ->middleware(CookiesLocale::class)
    ->get('some', fn () => response()->json(__('Foo')));
