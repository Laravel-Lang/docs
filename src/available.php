<?php

declare(strict_types=1);

use DragonCode\Core\Xml\Facades\Xml;
use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\LocaleNames;

require 'autoload.php';

function getLocale(string $locale): string
{
    $localized = LocaleNames::get($locale)[$locale];
    $english   = LocaleNames::get('en')[$locale];

    return <<<HTML
        ## $localized

        The $english locale is added using the console command:

        ```Bash
        %command-add% $locale
        ```
        HTML;
}

$dom = Xml::init('topic', [
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',

    'xsi:noNamespaceSchemaLocation' => 'https://resources.jetbrains.com/writerside/1.0/topic.v2.xsd',

    'title'      => 'Lists Available Locales',
    'id'         => 'lists-available-locales',
    'is-library' => 'true',
])->setSkipEmptyAttributes();

$dom->doctype('topic', '', 'https://resources.jetbrains.com/writerside/1.0/xhtml-entities.dtd');

$snippet = $snippet = $dom->makeItem('snippet', '', ['id' => 'available-locales']);

foreach (Locale::values() as $locale) {
    $english   = LocaleNames::get('en')[$locale];
    $localized = LocaleNames::get($locale)[$locale];

    $chapter = $dom->makeItem('chapter', '', [
        'title' => $localized,
        'id'    => 'lists-available-locales-' . $locale,
    ]);

    $paragraph = $dom->makeItem('p', "The $english locale is added using the console command:");

    $codeBlock = $dom->makeItem('code-block', "%command-add% $locale", [
        'lang' => 'bash',
    ]);

    $dom->appendChild($chapter, $paragraph);
    $dom->appendChild($chapter, $codeBlock);
    $dom->appendChild($snippet, $chapter);
}

$dom->appendToRoot($snippet);

file_put_contents(__DIR__ . '/../docs/topics/library-available-locales.topic', $dom->get());
