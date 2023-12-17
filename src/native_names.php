<?php

declare(strict_types=1);

use DragonCode\PrettyArray\Services\Formatter;
use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeCountryNames\CountryNames;
use LaravelLang\NativeCountryNames\Data\CountryData;
use LaravelLang\NativeCountryNames\Enums\SortBy as CountrySortBy;
use LaravelLang\NativeCurrencyNames\CurrencyNames;
use LaravelLang\NativeCurrencyNames\Data\CurrencyData;
use LaravelLang\NativeCurrencyNames\Enums\SortBy as CurrencySortBy;
use LaravelLang\NativeLocaleNames\Enums\SortBy as LocalesSortBy;
use LaravelLang\NativeLocaleNames\LocaleNames;

require 'autoload.php';

$pages = [
    // Locale
    ['usage-native-locale-names-localized-names.txt', fn () => LocaleNames::get(Locale::Bengali)],
    ['usage-native-locale-names-native-names.txt', fn () => LocaleNames::get()],
    ['usage-native-locale-names-sort-by-keys.txt', fn () => LocaleNames::get(Locale::English, LocalesSortBy::Key)],
    ['usage-native-locale-names-sort-by-values.txt', fn () => LocaleNames::get(Locale::English, LocalesSortBy::Value)],
    // Countries
    ['usage-native-country-names-localized-names.txt', fn () => flatten(CountryNames::get(Locale::Bengali))],
    ['usage-native-country-names-native-names.txt', fn () => flatten(CountryNames::get())],
    [
        'usage-native-country-names-sort-by-keys.txt',
        fn () => flatten(CountryNames::get(Locale::English, CountrySortBy::Key)),
    ],
    [
        'usage-native-country-names-sort-by-values.txt',
        fn () => flatten(CountryNames::get(Locale::English, CountrySortBy::Value)),
    ],
    // Currencies
    ['usage-native-currency-names-localized-names.txt', fn () => flatten(CurrencyNames::get(Locale::Bengali))],
    ['usage-native-currency-names-native-names.txt', fn () => flatten(CurrencyNames::get())],
    [
        'usage-native-currency-names-sort-by-keys.txt',
        fn () => flatten(CurrencyNames::get(Locale::English, CurrencySortBy::Key)),
    ],
    [
        'usage-native-currency-names-sort-by-values.txt',
        fn () => flatten(CurrencyNames::get(Locale::English, CurrencySortBy::Value)),
    ],
    // Locale List
    ['usage-list-of-locales-list-of-codes.txt', fn () => Locale::values()],
    ['usage-list-of-locales-list-of-titles.txt', fn () => Locale::names()],
    ['usage-list-of-locales-list-of-names.txt', fn () => Locale::options()],
];

function flatten(Collection $items): array
{
    return $items->map(
        fn (CountryData|CurrencyData $data) => $data->localized
    )->all();
}

function storeDump(string $filename, Closure $value): void
{
    $service = Formatter::make();

    file_put_contents($filename, $service->raw($value()));
}

foreach ($pages as $page) {
    storeDump(__DIR__ . '/../docs/snippets/' . $page[0], $page[1]);
}
