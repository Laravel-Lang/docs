<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Translator\Integrations\Yandex;

class Example
{
    public function __construct(
        protected Yandex $yandex
    ) {}

    public function fromString(): string
    {
        return $this->yandex->translate('some text', Locale::French);
    }

    public function fromArray1(): array
    {
        return $this->yandex->translate([
            'some text 1',
            'some text 2',
        ], Locale::French);
    }

    public function fromArray2(): array
    {
        return $this->yandex->translate([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ], Locale::French);
    }

    public function fromCollection(): array
    {
        return $this->yandex->translate(new Collection([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ]), Locale::French);
    }
}
