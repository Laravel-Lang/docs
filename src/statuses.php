<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\LocaleNames;

require 'autoload.php';

function moveMain(string $package, string $title): void
{
    $sourcePath = __DIR__ . "/../tmp/$package/docs/status.md";
    $targetPath = __DIR__ . '/../docs/topics/';

    $content = file_get_contents($sourcePath);

    $content = str_replace('---' . PHP_EOL . 'editLink: false' . PHP_EOL . '---' . PHP_EOL . PHP_EOL, '', $content);
    $content = str_replace('# Completion Status', "# Completion Status: $title", $content);

    foreach (Locale::values() as $locale) {
        $title = LocaleNames::get($locale)[$locale];

        $content = str_replace(
            [
                sprintf('[%s&nbsp;✔](statuses/%s.md)', $locale, $locale),
                sprintf('[%s&nbsp;❗](statuses/%s.md)', $locale, $locale),
            ],
            [
                sprintf('<a href="statuses-%s-af.md" summary="%s">%s ✔</a>', $package, $title, $locale),
                sprintf('<a href="statuses-%s-af.md" summary="%s">%s ❗</a>', $package, $title, $locale),
            ],
            $content
        );
    }

    file_put_contents($targetPath . "statuses-$package.md", $content);
}

function moveStatus(string $package, Locale $locale): void
{
    $sourcePath = __DIR__ . "/../tmp/$package/docs/statuses/$locale->value.md";
    $targetPath = __DIR__ . '/../docs/topics/';

    $title = LocaleNames::get($locale)[$locale->value];

    $content = file_get_contents($sourcePath);

    $content = str_replace('---' . PHP_EOL . 'editLink: false' . PHP_EOL . '---' . PHP_EOL . PHP_EOL, '', $content);
    $content = str_replace(PHP_EOL . '[ [go back](../status.md) | [to top](#) ]' . PHP_EOL . PHP_EOL, '', $content);
    $content = preg_replace('/^#\s([a-zA-Z-_]+)/', '# ' . $title, $content);

    file_put_contents($targetPath . "statuses-$package-$locale->value.md", $content);
}

moveMain('attributes', 'Attributes');
moveMain('http-statuses', 'HTTP Statuses');
moveMain('lang', 'Lang');

foreach (Locale::cases() as $locale) {
    if ($locale === Locale::English) {
        continue;
    }

    moveStatus('attributes', $locale);
    moveStatus('http-statuses', $locale);
    moveStatus('lang', $locale);
}
