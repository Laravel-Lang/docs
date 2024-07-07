<?php

declare(strict_types=1);

route('localized.show', ['bar' => 'show', 'locale' => app()->getLocale()]);
// https://example.com/fr/foo/show

route('localized.show', ['bar' => 'show', 'locale' => 'de']);
// https://example.com/de/foo/show

route('localized.show', ['bar' => 'show']);
// https://example.com/fr/foo/show

route('localized.show', ['bar' => 'show', 'locale' => 'de']);
// https://example.com/de/foo/show
