<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;
use LaravelLang\Translator\Facades\Translate;

$translated1 = Translate::text(
    text: 'some text',
    to  : Locale::French
);

$translated2 = Translate::text([
    'some text 1',
    'some text 2',
], Locale::French);

$translated3 = Translate::text([
    'foo1' => 'some text 1',
    'foo2' => 'some text 2',
], Locale::French);
