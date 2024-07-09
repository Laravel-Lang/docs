<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\TranslationServiceProvider as BaseTranslation;
use LaravelLang\JsonFallback\TranslationServiceProvider as JsonTranslation;

return [
    'providers' => ServiceProvider::defaultProviders()->merge([
        // other service providers
    ])->replace([
        BaseTranslation::class => JsonTranslation::class,
    ])->toArray(),
];
