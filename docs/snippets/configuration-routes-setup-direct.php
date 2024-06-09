<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\CookiesLocale;
use LaravelLang\Routes\Middlewares\HeaderLocale;
use LaravelLang\Routes\Middlewares\ParameterLocale;
use LaravelLang\Routes\Middlewares\ParameterRedirectLocale;
use LaravelLang\Routes\Middlewares\SessionLocale;

app('router')
    ->middleware(ParameterLocale::class)
    ->get('some/{locale}', fn () => view('welcome'));

app('router')
    ->middleware(ParameterRedirectLocale::class)
    ->get('some/{locale?}', fn () => view('welcome'));

app('router')
    ->middleware(HeaderLocale::class)
    ->get('some', fn () => view('welcome'));

app('router')
    ->middleware(CookiesLocale::class)
    ->get('some', fn () => view('welcome'));

app('router')
    ->middleware(SessionLocale::class)
    ->get('some', fn () => view('welcome'));
