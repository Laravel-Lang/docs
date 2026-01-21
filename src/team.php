<?php

declare(strict_types=1);

use Carbon\Carbon;
use DragonCode\Core\Xml\Facades\Xml;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use LaravelLang\LocaleList\Locale;

require 'autoload.php';

$team = [
    Locale::Afrikaans->value          => [],
    Locale::Albanian->value           => [],
    Locale::Amharic->value            => [],
    Locale::Arabic->value             => ['Khuthaily', 'mohamedsabil83'],
    Locale::Armenian->value           => [],
    Locale::Assamese->value           => [],
    Locale::Azerbaijani->value        => ['slvler'],
    Locale::Bambara->value            => [],
    Locale::Basque->value             => [],
    Locale::Belarusian->value         => [],
    Locale::Bengali->value            => ['arman-arif'],
    Locale::Bhojpuri->value           => [],
    Locale::Bosnian->value            => ['jure-knezovic'],
    Locale::Bulgarian->value          => [],
    Locale::Catalan->value            => [],
    Locale::Cebuano->value            => [],
    Locale::CentralKhmer->value       => [],
    Locale::Chinese->value            => ['overtrue'],
    Locale::ChineseHongKong->value    => ['overtrue'],
    Locale::ChineseT->value           => ['overtrue'],
    Locale::ChineseT->value           => [],
    Locale::Croatian->value           => ['jure-knezovic'],
    Locale::Czech->value              => [],
    Locale::Danish->value             => ['jensstigaard'],
    Locale::Dogri->value              => [],
    Locale::Dutch->value              => ['WhereIsLucas', 'chillbram'],
    Locale::English->value            => [],
    Locale::Esperanto->value          => [],
    Locale::Estonian->value           => [],
    Locale::Ewe->value                => [],
    Locale::Finnish->value            => [],
    Locale::French->value             => ['caouecs', 'WhereIsLucas'],
    Locale::Frisian->value            => [],
    Locale::Galician->value           => [],
    Locale::Georgian->value           => [],
    Locale::German->value             => ['sotten', 'WhereIsLucas'],
    Locale::GermanAustria->value      => ['sotten', 'WhereIsLucas'],
    Locale::GermanSwitzerland->value  => ['sotten'],
    Locale::Greek->value              => ['michaelkonstantinou'],
    Locale::Gujarati->value           => [],
    Locale::Hausa->value              => [],
    Locale::Hawaiian->value           => [],
    Locale::Hebrew->value             => [],
    Locale::Hindi->value              => [],
    Locale::Hungarian->value          => [],
    Locale::Icelandic->value          => [],
    Locale::Igbo->value               => [],
    Locale::Indonesian->value         => [],
    Locale::Irish->value              => [],
    Locale::Italian->value            => ['masterix21'],
    Locale::Japanese->value           => ['wadakatu'],
    Locale::Kannada->value            => [],
    Locale::Kazakh->value             => [],
    Locale::Kinyarwanda->value        => [],
    Locale::Korean->value             => ['cable8mm'],
    Locale::Kurdish->value            => [],
    Locale::KurdishSorani->value      => [],
    Locale::Kyrgyz->value             => [],
    Locale::Lao->value                => [],
    Locale::Latvian->value            => [],
    Locale::Lingala->value            => [],
    Locale::Lithuanian->value         => [],
    Locale::Luganda->value            => [],
    Locale::Luxembourgish->value      => [],
    Locale::Macedonian->value         => ['keljtanoski'],
    Locale::Maithili->value           => [],
    Locale::Malagasy->value           => [],
    Locale::Malay->value              => [],
    Locale::Malayalam->value          => [],
    Locale::Maltese->value            => [],
    Locale::Maori->value              => [],
    Locale::Marathi->value            => [],
    Locale::MeiteilonManipuri->value  => [],
    Locale::Mongolian->value          => [],
    Locale::MyanmarBurmese->value     => [],
    Locale::Nepali->value             => ['diveshthapa'],
    Locale::NorwegianBokmal->value    => ['Tor2r'],
    Locale::NorwegianNynorsk->value   => ['Tor2r'],
    Locale::Occitan->value            => [],
    Locale::OdiaOriya->value          => [],
    Locale::Oromo->value              => [],
    Locale::Pashto->value             => [],
    Locale::Persian->value            => ['ariaieboy'],
    Locale::Pilipino->value           => [],
    Locale::Polish->value             => ['makowskid'],
    Locale::Portuguese->value         => ['jorgercosta'],
    Locale::PortugueseBrazil->value   => ['EuCarlos'],
    Locale::Punjabi->value            => [],
    Locale::Quechua->value            => [],
    Locale::Romanian->value           => ['Van4kk'],
    Locale::Russian->value            => ['andrey-helldar'],
    Locale::Sanskrit->value           => [],
    Locale::Sardinian->value          => [],
    Locale::ScotsGaelic->value        => [],
    Locale::SerbianCyrillic->value    => ['LukaLatkovic'],
    Locale::SerbianLatin->value       => ['LukaLatkovic', 'jure-knezovic'],
    Locale::SerbianMontenegrin->value => ['LukaLatkovic', 'jure-knezovic'],
    Locale::Shona->value              => [],
    Locale::Sindhi->value             => [],
    Locale::Sinhala->value            => [],
    Locale::Slovak->value             => [],
    Locale::Slovenian->value          => [],
    Locale::Somali->value             => [],
    Locale::Spanish->value            => ['luisprmat'],
    Locale::Sundanese->value          => [],
    Locale::Swahili->value            => ['Pheogrammer'],
    Locale::Swedish->value            => [],
    Locale::Tagalog->value            => [],
    Locale::Tajik->value              => [],
    Locale::Tamil->value              => [],
    Locale::Tatar->value              => [],
    Locale::Telugu->value             => [],
    Locale::Thai->value               => ['bact', 'pichaya07'],
    Locale::Tigrinya->value           => [],
    Locale::Turkish->value            => ['slvler'],
    Locale::Turkmen->value            => [],
    Locale::TwiAkan->value            => [],
    Locale::Uighur->value             => [],
    Locale::Ukrainian->value          => ['Oleksandr-Moik', 'MrAlKuz'],
    Locale::Urdu->value               => [],
    Locale::UzbekCyrillic->value      => [],
    Locale::UzbekLatin->value         => [],
    Locale::Vietnamese->value         => ['dinhquochan'],
    Locale::Welsh->value              => [],
    Locale::Xhosa->value              => [],
    Locale::Yiddish->value            => [],
    Locale::Yoruba->value             => [],
    Locale::Zulu->value               => [],
];

$packages = [
    'statuses-lang'          => 'Lang',
    'statuses-actions'       => 'Actions',
    'statuses-attributes'    => 'Attributes',
    'statuses-http-statuses' => 'HTTP Statuses',
    'statuses-moonshine'     => 'MoonShine Admin Panel',
    'statuses-starter-kits'  => 'Starter Kits',
];

ksort($team);

function request(string $uri, ?array $default = null): ?array
{
    try {
        $client = new Client([
            'base_uri' => 'https://api.github.com',
            'headers'  => [
                'Authorization' => 'Bearer ' . ($_SERVER['COMPOSER_TOKEN'] ?? ''),
            ],
        ]);

        $response = $client->get($uri);

        if ($response->getStatusCode() < 400) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return $default;
    } catch (Throwable) {
        return $default;
    }
}

$dom = Xml::init('topic', [
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',

    'xsi:noNamespaceSchemaLocation' => 'https://resources.jetbrains.com/writerside/1.0/topic.v2.xsd',

    'title'      => 'Library Our Team',
    'id'         => 'library-our-team',
    'is-library' => 'true',
])->setSkipEmptyAttributes();

$dom->doctype('topic', '', 'https://resources.jetbrains.com/writerside/1.0/xhtml-entities.dtd');

$snippet = $dom->makeItem('snippet', '', ['id' => 'our-team']);
$table   = $dom->makeItem('table', '');

$headers = $dom->makeItem('tr', '');

$headers->appendChild($dom->makeItem('td', 'Locale'));
$headers->appendChild($dom->makeItem('td', 'Packages'));
$headers->appendChild($dom->makeItem('td', 'Referents'));

$table->appendChild($headers);

$block = function (DOMNode $item) use ($dom) {
    $element = $dom->makeItem('p', '');

    $element->appendChild($item);

    return $element;
};

$break = fn () => $dom->makeItem('br', '');

$activeAccounts = [];

function filterPeoples(array $accounts, &$activeAccounts, $packages): array
{
    return array_filter($accounts, static function ($account) use (&$activeAccounts, $packages) {
        if (array_key_exists($account, $activeAccounts)) {
            return $activeAccounts[$account];
        }

        if ($activity = request("/users/$account/events")) {
            $date = collect($activity)
                ->filter(static fn (array $item) => Str::startsWith(Arr::get($item, 'repo.name'), 'Laravel-Lang/'))
                ->max('created_at');

            if ($date && Carbon::parse($date)->gt(Carbon::now()->subYear())) {
                return $activeAccounts[$account] = true;
            }
        }

        foreach (array_keys($packages) as $package) {
            $repository = Str::after($package, 'statuses-');

            if ($activity = request("/repos/Laravel-Lang/$repository/commits?author=$account")) {
                $date = collect($activity)->max('commit.author.date');

                if (Carbon::parse($date)->gt(Carbon::now()->subYear())) {
                    return $activeAccounts[$account] = true;
                }
            }
        }

        return $activeAccounts[$account] = false;
    });
}

foreach ($team as $locale => $accounts) {
    if (! $peoples = filterPeoples($accounts, $activeAccounts, $packages)) {
        continue;
    }

    sort($peoples);

    $row = $dom->makeItem('tr', '');

    $tableLocale   = $dom->makeItem('td', '');
    $tablePackages = $dom->makeItem('td', '');
    $tablePeoples  = $dom->makeItem('td', '');

    $localeLink = $dom->makeItem('a', $locale, [
        'href'    => 'available-locales-list.topic#lists-available-locales-' . $locale,
        'summary' => $locale,
    ]);

    $tableLocale->appendChild($block($localeLink));

    $paragraph   = $dom->makeItem('p', '');
    $lastPackage = array_key_last($packages);

    foreach ($packages as $name => $package) {
        $packageLink = $dom->makeItem('a', $package, [
            'href' => "$name-$locale.md",
        ]);

        $paragraph->appendChild($packageLink);

        if ($name !== $lastPackage) {
            $paragraph->appendChild($break());
        }
    }

    $tablePackages->appendChild($paragraph);

    foreach ($peoples as $key => $people) {
        $peopleLink = $dom->makeItem('a', '@' . $people, [
            'href' => 'https://github.com/' . $people,
        ]);

        $tablePeoples->appendChild($block($peopleLink));
    }

    $row->appendChild($tableLocale);
    $row->appendChild($tablePackages);
    $row->appendChild($tablePeoples);

    $table->appendChild($row);
}

$snippet->appendChild($table);

$dom->appendToRoot($snippet);

file_put_contents(__DIR__ . '/../docs/topics/library-our-team.topic', $dom->get());
