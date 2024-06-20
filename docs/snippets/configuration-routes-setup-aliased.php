<?php

declare(strict_types=1);

app('router')
    ->middleware('localization.parameter')
    ->get('some/{locale}', fn () => view('welcome'));

app('router')
    ->middleware('localization.redirect')
    ->get('some/{locale?}', fn () => view('welcome'));

app('router')
    ->middleware('localization.header')
    ->get('some', fn () => view('welcome'));

app('router')
    ->middleware('localization.cookie')
    ->get('some', fn () => view('welcome'));

app('router')
    ->middleware('localization.session')
    ->get('some', fn () => view('welcome'));

app('router')
    ->middleware('localization.model')
    ->get('some', fn () => view('welcome'));
