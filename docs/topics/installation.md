# Installation

You can install the package via [Composer](https://getcomposer.org):

```Bash
%install-common%
```

The [Common](packages-common.md) package will install all the necessary versions of packages at once and you will not
need to maintain each one.

Or you can install only the packages you need using the required console commands:

```Bash
%install-publisher%

%install-lang%
%install-attributes%
%install-http-statuses%

%install-locales%
%install-locale-list%

%install-native-country-names%
%install-native-currency-names%
%install-native-locale-names%
```

> We recommend installing packages useful for production into the main dependencies of the project.
> The `require` section in the `composer.json` file is responsible for this.
>
> We recommend installing packages needed only during development in the development section - `require-dev`,
> since these projects will not be used directly in production.
>
{style="note"}

You can also combine dependencies. For example, if in production you need to manage locales, then to install,
run the following console commands:

```Bash
%install-common%
%install-locales%
```

## Settings

Optionally, you can publish the config file with:

```Bash
php artisan vendor:publish --provider="%package-publisher-namespace%"
```

This is the contents of the published `%config-filename%` file:

```php
```

{src="https://raw.githubusercontent.com/Laravel-Lang/publisher/main/config/public.php" include-lines="18-"}

## Aliases

> Please note that this is a different configuration file.
>
> The Laravel Framework does not allow configuration files to be merged on the fly when publishing, so this process must
> be done manually.
>
{style="warning" title="Note"}

If you need to use locale [aliases](packages-locales.md), you can add the `aliases` key to the previously published
configuration file (`%config-filename%`).

Or you can publish if you haven’t done so before:

```Bash
php artisan vendor:publish --provider="%package-locales-namespace%"
```

This is the contents of the published `%config-filename%` file:

```php
```

{src="https://raw.githubusercontent.com/Laravel-Lang/locales/main/config/public.php" include-lines="18-"}

> Why such difficulties?
>
> We don't want to turn the client's application into a garbage dump with many different files
> like `config/publisher.php`, `config/locales.php`, `config/laravel-lang.php`, etc.
>
> Therefore, we decided to use one configuration file for all our packages - this is `%config-filename%`.
