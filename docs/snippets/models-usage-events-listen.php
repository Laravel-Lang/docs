<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use LaravelLang\Models\Events\AllTranslationsHasBeenForgetEvent;
use LaravelLang\Models\Events\TranslationHasBeenForgetEvent;
use LaravelLang\Models\Events\TranslationHasBeenSetEvent;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(static function (AllTranslationsHasBeenForgetEvent $event) {
            Log::info('Forget all locales', [
                'model' => $event->model->getKey(),
            ]);
        });

        Event::listen(static function (TranslationHasBeenForgetEvent $event) {
            Log::info('Forget locale', [
                'model'  => $event->model->getKey(),
                'locale' => $event->locale?->value,
            ]);
        });

        Event::listen(static function (TranslationHasBeenSetEvent $event) {
            Log::info('Set new translation', [
                'model'  => $event->model->getKey(),
                'locale' => $event->locale?->value,
                'column' => $event->column,

                'old' => $event->oldValue,
                'new' => $event->newValue,
            ]);
        });
    }
}
