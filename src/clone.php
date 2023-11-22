<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;

require 'autoload.php';

function moveMain(string $package): void
{
    $sourcePath = __DIR__ . "/../tmp/$package/docs/status.md";
    $targetPath = __DIR__ . '/../docs/topics/';

    $title = ucfirst($package);

    // main
    $content = file_get_contents($sourcePath);

    $content = str_replace('---' . PHP_EOL . 'editLink: false' . PHP_EOL . '---' . PHP_EOL . PHP_EOL, '', $content);
    $content = str_replace('# Completion Status', "# Completion Status: $title", $content);
    $content = preg_replace('/\(statuses\/([a-zA-Z-_]+)\.md\)/', "(statuses-$package-$1.md)", $content);

    file_put_contents($targetPath . "statuses-$package.md", $content);
}

function moveStatus(string $package, Locale $locale): void
{
    $sourcePath = __DIR__ . "/../tmp/$package/docs/statuses/$locale->value.md";
    $targetPath = __DIR__ . '/../docs/topics/';

    // main
    $content = file_get_contents($sourcePath);

    $content = str_replace('---' . PHP_EOL . 'editLink: false' . PHP_EOL . '---' . PHP_EOL . PHP_EOL, '', $content);
    $content = str_replace(PHP_EOL . '[ [go back](../status.md) | [to top](#) ]' . PHP_EOL . PHP_EOL, '', $content);
    $content = preg_replace('/^#\s([a-zA-Z-_]+)/', '# ' . $locale->value, $content);

    file_put_contents($targetPath . "statuses-$package-$locale->value.md", $content);
}

moveMain('attributes');
moveMain('http-statuses');
moveMain('lang');

foreach (Locale::cases() as $locale) {
    if ($locale === Locale::English) {
        continue;
    }

    moveStatus('attributes', $locale);
    moveStatus('http-statuses', $locale);
    moveStatus('lang', $locale);
}
