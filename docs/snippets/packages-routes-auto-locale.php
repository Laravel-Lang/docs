<?php

declare(strict_types=1);

localizedRoute('show', ['bar' => 'show']);
// https://example.com/fr/foo/show

localizedRoute('show', ['bar' => 'show', 'locale' => 'de']);
// https://example.com/de/foo/show

localizedRoute('localized.show', ['bar' => 'show']);
// https://example.com/fr/foo/show

localizedRoute('localized.show', ['bar' => 'show', 'locale' => 'de']);
// https://example.com/de/foo/show

route('localized.show', ['bar' => 'show', 'locale' => app()->getLocale()]);
// https://example.com/fr/foo/show
