<?php

declare(strict_types=1);

use LaravelLang\Routes\Middlewares\LocalizationByCookie;
use LaravelLang\Routes\Middlewares\LocalizationByHeader;
use LaravelLang\Routes\Middlewares\LocalizationByParameter;
use LaravelLang\Routes\Middlewares\LocalizationByParameterWithRedirect;
use LaravelLang\Routes\Middlewares\LocalizationBySession;

app('router')
    ->middleware(LocalizationByParameter::class)
    ->get('some/{locale}', fn () => view('welcome'));

app('router')
    ->middleware(LocalizationByParameterWithRedirect::class)
    ->get('some/{locale?}', fn () => view('welcome'));

app('router')
    ->middleware(LocalizationByHeader::class)
    ->get('some', fn () => view('welcome'));

app('router')
    ->middleware(LocalizationByCookie::class)
    ->get('some', fn () => view('welcome'));

app('router')
    ->middleware(LocalizationBySession::class)
    ->get('some', fn () => view('welcome'));
