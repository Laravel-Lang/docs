<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Translator\Services\Translate;

class Example
{
    public function __construct(
        protected Translate $translator
    ) {}

    public function fromString(): string
    {
        return $this->translator->viaDeepl('some text', Locale::French);
    }

    public function fromArray1(): array
    {
        return $this->translator->viaDeepl([
            'some text 1',
            'some text 2',
        ], Locale::French);
    }

    public function fromArray2(): array
    {
        return $this->translator->viaDeepl([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ], Locale::French);
    }

    public function fromCollection(): array
    {
        return $this->translator->viaDeepl(new Collection([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ]), Locale::French);
    }
}
