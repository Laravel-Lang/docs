<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LaravelLang\LocaleList\Locale;

class User extends Authenticatable
{
    protected function locale(): Attribute
    {
        return Attribute::make(
            get: fn () => Locale::French
        );
    }
}
