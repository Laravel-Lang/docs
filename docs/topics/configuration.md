# Configuration

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
