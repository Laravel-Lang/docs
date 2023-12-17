<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\TranslationServiceProvider as BaseTranslationServiceProvider;
use LaravelLang\JsonFallback\TranslationServiceProvider as JsonTranslationServiceProvider;

return [
    'providers' => ServiceProvider::defaultProviders()->merge([
        // your service providers
    ])->replace([
        BaseTranslationServiceProvider::class => JsonTranslationServiceProvider::class,
    ])->toArray(),
];
