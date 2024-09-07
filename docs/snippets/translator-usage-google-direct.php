<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Translator\Integrations\Google;

class Example
{
    public function __construct(
        protected Google $google
    ) {
    }

    public function fromString(): string
    {
        return $this->google->translate('some text', Locale::French);
    }

    public function fromArray1(): array
    {
        return $this->google->translate([
            'some text 1',
            'some text 2',
        ], Locale::French);
    }

    public function fromArray2(): array
    {
        return $this->google->translate([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ], Locale::French);
    }

    public function fromCollection(): array
    {
        return $this->google->translate(new Collection([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ]), Locale::French);
    }
}
