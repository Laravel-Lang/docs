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
