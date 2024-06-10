<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use LaravelLang\Routes\Events\LocaleHasBeenSetEvent;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(static function (LocaleHasBeenSetEvent $event) {
            Log::info('Locale set to: ' . $event->locale->code);
        });
    }
}
