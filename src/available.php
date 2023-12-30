<?php

declare(strict_types=1);

use DragonCode\Core\Xml\Facades\Xml;
use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\LocaleNames;
use Stichoza\GoogleTranslate\GoogleTranslate as GT;

require 'autoload.php';

function translate(Xml $dom, DOMElement &$chapter, string $locale, string $text): void
{
    $available = [
        Locale::Afrikaans->value         => 'af',
        Locale::Albanian->value          => 'sq',
        Locale::Amharic->value           => 'am',
        Locale::Arabic->value            => 'ar',
        Locale::Armenian->value          => 'hy',
        Locale::Assamese->value          => 'as',
        Locale::Azerbaijani->value       => 'az',
        Locale::Bambara->value           => 'bm',
        Locale::Basque->value            => 'eu',
        Locale::Belarusian->value        => 'be',
        Locale::Bengali->value           => 'bn',
        Locale::Bhojpuri->value          => 'bho',
        Locale::Bosnian->value           => 'bs',
        Locale::Bulgarian->value         => 'bg',
        Locale::Catalan->value           => 'ca',
        Locale::Cebuano->value           => 'ceb',
        Locale::CentralKhmer->value      => 'km',
        Locale::Chinese->value           => 'zh-CN',
        Locale::ChineseHongKong->value   => 'zh',
        Locale::ChineseT->value          => 'zh-TW',
        Locale::Croatian->value          => 'hr',
        Locale::Czech->value             => 'cs',
        Locale::Danish->value            => 'da',
        Locale::Dogri->value             => 'doi',
        Locale::Dutch->value             => 'nl',
        Locale::Esperanto->value         => 'eo',
        Locale::Estonian->value          => 'et',
        Locale::Ewe->value               => 'ee',
        Locale::Finnish->value           => 'fi',
        Locale::French->value            => 'fr',
        Locale::Frisian->value           => 'fy',
        Locale::Galician->value          => 'gl',
        Locale::Georgian->value          => 'ka',
        Locale::German->value            => 'de',
        Locale::GermanSwitzerland->value => 'de',
        Locale::Greek->value             => 'el',
        Locale::Gujarati->value          => 'gu',
        Locale::Hausa->value             => 'ha',
        Locale::Hawaiian->value          => 'haw',
        Locale::Hebrew->value            => 'he',
        Locale::Hindi->value             => 'hi',
        Locale::Hungarian->value         => 'hu',
        Locale::Icelandic->value         => 'is',
        Locale::Igbo->value              => 'ig',
        Locale::Indonesian->value        => 'id',
        Locale::Irish->value             => 'ga',
        Locale::Italian->value           => 'it',
        Locale::Japanese->value          => 'ja',
        Locale::Kannada->value           => 'kn',
        Locale::Kazakh->value            => 'kk',
        Locale::Kinyarwanda->value       => 'rw',
        Locale::Korean->value            => 'ko',
        Locale::Kurdish->value           => 'ku',
        Locale::KurdishSorani->value     => 'ckb',
        Locale::Kyrgyz->value            => 'ky',
        Locale::Lao->value               => 'lo',
        Locale::Latvian->value           => 'lv',
        Locale::Lingala->value           => 'ln',
        Locale::Lithuanian->value        => 'lt',
        Locale::Luganda->value           => 'lg',
        Locale::Luxembourgish->value     => 'lb',
        Locale::Macedonian->value        => 'mk',
        Locale::Maithili->value          => 'mai',
        Locale::Malagasy->value          => 'mg',
        Locale::Malay->value             => 'ms',
        Locale::Malayalam->value         => 'ml',
        Locale::Maltese->value           => 'mt',
        Locale::Maori->value             => 'mi',
        Locale::Marathi->value           => 'mr',
        Locale::MeiteilonManipuri->value => 'mni-Mtei',
        Locale::Mongolian->value         => 'mn',
        Locale::MyanmarBurmese->value    => 'my',
        Locale::Nepali->value            => 'ne',
        Locale::NorwegianBokmal->value   => 'no',
        Locale::NorwegianNynorsk->value  => 'no',
        Locale::OdiaOriya->value         => 'or',
        Locale::Oromo->value             => 'om',
        Locale::Pashto->value            => 'ps',
        Locale::Persian->value           => 'fa',
        Locale::Pilipino->value          => 'fil',
        Locale::Polish->value            => 'pl',
        Locale::Portuguese->value        => 'pt',
        Locale::PortugueseBrazil->value  => 'pt',
        Locale::Punjabi->value           => 'pa',
        Locale::Quechua->value           => 'qu',
        Locale::Romanian->value          => 'ro',
        Locale::Russian->value           => 'ru',
        Locale::Sanskrit->value          => 'sa',
        Locale::ScotsGaelic->value       => 'gd',
        Locale::SerbianCyrillic->value   => 'sr',
        Locale::Shona->value             => 'sn',
        Locale::Sindhi->value            => 'sd',
        Locale::Sinhala->value           => 'si',
        Locale::Slovak->value            => 'sk',
        Locale::Slovenian->value         => 'sl',
        Locale::Somali->value            => 'so',
        Locale::Spanish->value           => 'es',
        Locale::Sundanese->value         => 'su',
        Locale::Swahili->value           => 'sw',
        Locale::Swedish->value           => 'sv',
        Locale::Tagalog->value           => 'tl',
        Locale::Tajik->value             => 'tg',
        Locale::Tamil->value             => 'ta',
        Locale::Tatar->value             => 'tt',
        Locale::Telugu->value            => 'te',
        Locale::Thai->value              => 'th',
        Locale::Tigrinya->value          => 'ti',
        Locale::Turkish->value           => 'tr',
        Locale::Turkmen->value           => 'tk',
        Locale::TwiAkan->value           => 'ak',
        Locale::Uighur->value            => 'ug',
        Locale::Ukrainian->value         => 'uk',
        Locale::Urdu->value              => 'ur',
        Locale::UzbekCyrillic->value     => 'uz',
        Locale::Vietnamese->value        => 'vi',
        Locale::Welsh->value             => 'cy',
        Locale::Xhosa->value             => 'xh',
        Locale::Yiddish->value           => 'yi',
        Locale::Yoruba->value            => 'yo',
        Locale::Zulu->value              => 'zu',
    ];

    if (! array_key_exists($locale, $available)) {
        $dom->appendChild($chapter, $dom->makeItem('p', $text));

        return;
    }

    $translated = GT::trans($text, $available[$locale], 'en');

    $dom->appendChild($chapter, $dom->makeItem('p', $translated));
    $dom->appendChild($chapter, $dom->makeItem('p', $text));
}

$dom = Xml::init('topic', [
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',

    'xsi:noNamespaceSchemaLocation' => 'https://resources.jetbrains.com/writerside/1.0/topic.v2.xsd',

    'title'      => 'Library Available Locales',
    'id'         => 'lists-available-locales',
    'is-library' => 'true',
])->setSkipEmptyAttributes();

$dom->doctype('topic', '', 'https://resources.jetbrains.com/writerside/1.0/xhtml-entities.dtd');

$snippet = $snippet = $dom->makeItem('snippet', '', ['id' => 'available-locales']);

foreach (Locale::values() as $locale) {
    echo $locale . '...' . PHP_EOL;

    $english   = LocaleNames::get('en')[$locale];
    $localized = LocaleNames::get($locale)[$locale];

    $chapter = $dom->makeItem('chapter', '', [
        'title' => $localized,
        'id'    => 'lists-available-locales-' . $locale,
    ]);

    translate(
        $dom,
        $chapter,
        $locale,
        "How to add $english localization to a Laravel application? To do this, you need to run the console command below:"
    );

    $codeBlock = $dom->makeItem('code-block', "%command-add% $locale", [
        'lang' => 'bash',
    ]);

    $dom->appendChild($chapter, $codeBlock);
    $dom->appendChild($snippet, $chapter);
}

$dom->appendToRoot($snippet);

file_put_contents(__DIR__ . '/../docs/topics/library-available-locales.topic', $dom->get());
