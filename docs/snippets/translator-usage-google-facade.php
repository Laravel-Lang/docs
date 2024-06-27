<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Translator\Facades\Translate;

$translate1 = Translate::viaGoogle('some text', Locale::French);
// returns string

$translate2 = Translate::viaGoogle([
    'some text 1',
    'some text 2',
], Locale::French);
// returns array

$translate3 = Translate::viaGoogle([
    'foo1' => 'some text 1',
    'foo2' => 'some text 2',
], Locale::French);
// returns array

$translate3 = Translate::viaGoogle(new Collection([
    'foo1' => 'some text 1',
    'foo2' => 'some text 2',
]), Locale::French);
// returns array
