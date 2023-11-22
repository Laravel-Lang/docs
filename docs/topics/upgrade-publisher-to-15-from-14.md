# To 15 from 14

- [Updating Dependencies](#updating-dependencies)
- [New constants namespace](#new-constants-namespace)
- [New facade helper](#new-facade-helper)
- [Using in production](#using-in-production)

## Updating Dependencies

You should update the following dependency in your application's `composer.json` file:

- `%package-publisher%` to `^15.0`

Rename the configuration file:

```Bash
mv config/lang-publisher.php config/localization.php
```

Run the update dependency console command:

```Bash
composer update
```

## New constants namespace

Replace the locales namespace:

```php
LaravelLang\Publisher\Constants\Locales
```

with

```php
LaravelLang\Locales\Enums\Locale
```

For example:

```php
// Before
LaravelLang\Publisher\Constants\Locales::AFRIKAANS; // af

// After
LaravelLang\Locales\Enums\Locale::Afrikaans; // af
```

The name of the cases is aligned with the [PER standard](https://www.php-fig.org/per/coding-style)
(see `enumerations` section).

Also [changed](installation.md#aliases) `aliases` section in the configuration file.

## New facade helper

Before

```php
use LaravelLang\Publisher\Facades\Helpers\Locales;

return Locales::available(); // array<string>
// ['en', 'fr', 'de', ...]

return Locales::getDefault(); // string
// de-DE
```

After:

```php
use LaravelLang\Publisher\Facades\Helpers\Locales;

return Locales::available(); // array<LocaleData>
// [<object>, <object>, ...]

return Locales::getDefault(); // LocaleData
// <object>

return Locales::raw()->available(); // array<string>
// ['en', 'fr', 'de', ...]

return Locales::raw()->getDefault(); // string
// de-DE
```

> `<object>` is a DTO class of `LocaleData`:

```php
use LaravelLang\Locales\Data\LocaleData;

app()->setLocale('vi');

// Non aliased
LocaleData {
  +code: "de"
  +type: "Latn"
  +name: "German"
  +native: "Deutsch"
  +localized: "Tiếng Đức"
  +regional: "de_DE"
}

// Aliased
LocaleData {
  +code: "de-DE"
  +type: "Latn"
  +name: "German"
  +native: "Deutsch"
  +localized: "Tiếng Đức"
  +regional: "de_DE"
}
```

## Using in production

If you use access to facades and locales in production, then you also need to perform the following steps:

```Bash
composer require %package-publisher% --dev --quiet
composer require %package-locales%
```

If you do not use locales in production, then just move `%package-publisher%` to the `require-dev` section and run
the `composer update` command, or simply run the following console command:

```Bash
composer require %package-publisher% --dev --quiet
```
