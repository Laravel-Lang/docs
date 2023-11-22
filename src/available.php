<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\LocaleNames;

require 'autoload.php';

function getLocale(string $locale): string
{
    $localized = LocaleNames::get($locale)[$locale];
    $english   = LocaleNames::get('en')[$locale];

    return <<<HTML
## $localized

The $english locale is added using the console command:

```Bash
%command-add% $locale
```
HTML;
}

$result = [];

foreach (Locale::values() as $locale) {
    $result[] = getLocale($locale);
}

file_put_contents(__DIR__ . '/../docs/snippets/available-locales-list.md', implode(PHP_EOL . PHP_EOL, $result));
