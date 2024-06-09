<?php

declare(strict_types=1);

// config/app.php
use LaravelLang\LocaleList\Locale;

return [
    'locale' => Locale::French->value,

    'fallback_locale' => Locale::German->value,
];
