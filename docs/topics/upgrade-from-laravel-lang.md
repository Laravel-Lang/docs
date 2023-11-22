# From laravel-lang/*

> Check the version of the framework and PHP against the [compatibility](release-notes.md#support-policy) table.
> 
{style="note"}

First you need to remove all old dependencies:

```Bash
composer remove %package-publisher% %package-lang% %package-attributes% %package-http-statuses%
```

After that, install the `%package-common%` version of the desired version:

```Bash
%install-common%
```

If you want to use the list of [locales](packages-locales.md) in production, then install the dependency separately:

```Bash
%install-locales%
```

Enjoy! 🙂
