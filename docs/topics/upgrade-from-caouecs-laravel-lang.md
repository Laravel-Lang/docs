# From caouecs/laravel-lang

If you are using the old version of the `laravel-lang/lang` package when it was called `caouecs/laravel-lang`,
then you need to follow the steps below to upgrade.

You also need to remove all package managers responsible for installing localizations in the project.
You can do all this with one command:

```Bash
composer remove caouecs/laravel-lang overtrue/laravel-lang arcanedev/laravel-lang andrey-helldar/laravel-lang-publisher %package-publisher%
```

Next, you need to delete the `config/lang-publisher.php` file if it exists:

```Bash
rm -f config/lang-publisher.php
```

After that, you can install the latest version of `%instance%`:

```Bash
%install-common%
```
