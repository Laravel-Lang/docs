<?php

declare(strict_types=1);

use DragonCode\Support\Facades\Helpers\Str;
use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\LocaleNames;

require 'autoload.php';

function imageLink(string $status): string
{
    return "<a href=\"statuses-:package:-:locale:.md\" summary=\":title:\"><img src=\"\$PROJECT_DIR\$/docs/images/locales/:locale:.svg\" alt=\":locale:\"> :locale: $status</a>";
}

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
                Str::replace(imageLink('✔'), [':locale:', ':title:', ':package:'], [$locale, $title, $package]),
                Str::replace(imageLink('❗'), [':locale:', ':title:', ':package:'], [$locale, $title, $package]),
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

    $id = sprintf('statuses-%s-%s', $package, $locale->value);

    $content = file_get_contents($sourcePath);

    $content = str_replace('---' . PHP_EOL . 'editLink: false' . PHP_EOL . '---' . PHP_EOL . PHP_EOL, '', $content);
    $content = str_replace(PHP_EOL . '[ [go back](../status.md) | [to top](#) ]' . PHP_EOL . PHP_EOL, '', $content);
    $content = preg_replace('/^#\s([a-zA-Z-_]+)/m', "# $title ($locale->value)\n{id=\"$id-title\"}", $content);
    $content = preg_replace('/^###\s([\w-]+)\n?\r?$/m', "## \$1\n{id=\"$id-\$1\"}", $content);
    $content = preg_replace('/^#####\s(.+):\s0/m', '', $content);
    $content = preg_replace('/^#####\s(.+):\s([1-9]\d*)/m', "> \$1: \$2\n>\n{style=\"warning\"}", $content);

    $content = str_replace(
        'All lines are translated 😊',
        <<<'HTML'
            > All lines are translated 😊
            >
            {style="note"}
            HTML
        ,
        $content
    );

    file_put_contents($targetPath . "statuses-$package-$locale->value.md", $content);
}

moveMain('actions', 'Actions');
moveMain('attributes', 'Attributes');
moveMain('http-statuses', 'HTTP Statuses');
moveMain('lang', 'Lang');

foreach (Locale::cases() as $locale) {
    if ($locale === Locale::English) {
        continue;
    }

    moveStatus('actions', $locale);
    moveStatus('attributes', $locale);
    moveStatus('http-statuses', $locale);
    moveStatus('lang', $locale);
}
