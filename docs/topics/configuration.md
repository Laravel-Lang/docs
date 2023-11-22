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

## Alignment

When updating files, all comments from the final files are automatically deleted.
Unfortunately, [var_export](https://www.php.net/manual/en/function.var-export.php) does not know how to work with
comments.

Your file example:

```php
// auth.php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'failed'   => 'These credentials do not match our records 123456.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'foo'      => 'bar',
];
```

An updated file like this:

```php
<?php

return [
    'failed'   => 'These credentials do not match our records.',
    'foo'      => 'bar',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
];
```

and example of `validation.php` file:

```php
// your file:
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted'         => 'The :attribute must be accepted.',
    'active_url'       => 'The :attribute is not a valid URL.',

    // many rules

    'uuid'             => 'The :attribute must be a valid UUID.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'name' => [
            'required' => 'Custom message 1',
            'string'   => 'Custom message 2',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */
    'attributes' => [
        'name' => 'Foo',
        'bar'  => 'Bar',
        'baz'  => 'Baz',
    ],
];
```

This is what it will look like after the update:

```php
<?php

return [
    'accepted'   => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',

    // many rules

    'uuid'       => 'The :attribute must be a valid UUID.',
    'custom'     => [
        'name' => [
            'required' => 'Custom message 1',
            'string'   => 'Custom message 2',
        ],
    ],
    'attributes' => [
        'bar'        => 'Bar',
        'baz'        => 'Baz',
        'email'      => 'E-Mail address',
        'first_name' => 'First Name',
        'last_name'  => 'Last Name',
        'name'       => 'Name',
        'username'   => 'Nickname',
    ],
];
```

## Smart Punctuation

When updating translation keys, you can also enable intelligent converts ASCII quotes, dashes, and ellipses to their
Unicode.

For example:

```json
{
    "Some": "\"It's super-configurable... you can even use additional extensions to expand its capabilities -- just like this one!\""
}
```

Will result in files:

```json
{
    "Some": "“It’s super-configurable… you can even use additional extensions to expand its capabilities – just like this one!”"
}
```

This option is enabled in the `%config-filename%` file:

```php
'smart_punctuation' => [
    'enable' => true,

    'common' => [
        'double_quote_opener' => '“',
        'double_quote_closer' => '”',
        'single_quote_opener' => '‘',
        'single_quote_closer' => '’',
    ],

    'locales' => [
        Locales::FRENCH->value => [
            'double_quote_opener' => '“',
            'double_quote_closer' => '”',
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],

        Locales::UKRAINIAN->value => [
            'double_quote_opener' => '«',
            'double_quote_closer' => '»',
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],
    ],
],
```

You can also set different rules for any localization.

By default, conversion is disabled.
