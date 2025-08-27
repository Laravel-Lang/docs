<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Translator\Services\Translate as TranslateService;

class Example
{
    public function __construct(
        protected TranslateService $translate
    ) {}

    public function get1(): string
    {
        return $this->translate->text('some text', Locale::French);
    }

    public function get2(): array
    {
        return $this->translate->text([
            'some text 1',
            'some text 2',
        ], Locale::French);
    }

    public function get3(): array
    {
        return $this->translate->text([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ], Locale::French);
    }

    public function get4(): array
    {
        return $this->translate->text(new Collection([
            'foo1' => 'some text 1',
            'foo2' => 'some text 2',
        ]), Locale::French);
    }
}
