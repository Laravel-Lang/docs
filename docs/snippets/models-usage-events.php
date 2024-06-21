<?php

declare(strict_types=1);

use LaravelLang\Models\Events\AllTranslationsHasBeenForgetEvent;
use LaravelLang\Models\Events\TranslationHasBeenForgetEvent;
use LaravelLang\Models\Events\TranslationHasBeenSetEvent;

AllTranslationsHasBeenForgetEvent::dispatch($model);
TranslationHasBeenForgetEvent::dispatch($model, $locale);
TranslationHasBeenSetEvent::dispatch($model, $column, $locale, $oldValue, $newValue);
