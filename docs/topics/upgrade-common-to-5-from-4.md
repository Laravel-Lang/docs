# To 5 from 4

- [Updating dependencies](#updating-dependencies)
- [Upgrade publisher](#upgrade-publisher)
- [Using in production](#using-in-production)

## Updating dependencies

You should update the following dependency in your application's `composer.json` file:

- `%package-common%` to `^5.0`

Rename the configuration file:

```Bash
mv config/lang-publisher.php config/localization.php
```

Run the update dependency console command:

```Bash
composer update
```

## Upgrade publisher

If you use access to locales or a locale helper in production, then also follow the necessary steps described in
the [publisher upgrade section](upgrade-publisher-to-15-from-14.md#new-constants-namespace).

## Using in production

If you use access to facades and locales in production, then you also need to perform the following steps:

```Bash
composer require %package-common% --dev --quiet
composer require %package-locales%
```

If you do not use locales in production, then just move `%package-common%` to the `require-dev` section and run
the `composer update` command, or simply run the following console command:

```Bash
composer require %package-common% --dev --quiet
```
