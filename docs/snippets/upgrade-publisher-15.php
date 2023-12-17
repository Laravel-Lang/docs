<?php

use LaravelLang\Locales\Data\LocaleData;

app()->setLocale('vi');

// Non aliased
LocaleData {
    +code: "de"
    +type: "Latn"
    +name: "German"
    +native: "Deutsch"
    +localized: "Tiếng Đức"
    +regional: "de_DE"
}

// Aliased
LocaleData {
    +code: "de-DE"
    +type: "Latn"
    +name: "German"
    +native: "Deutsch"
    +localized: "Tiếng Đức"
    +regional: "de_DE"
}
