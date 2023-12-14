# Release Notes

<tldr>

- <a anchor="versioning-scheme" summary="">Versioning Scheme</a>
- <a anchor="support-policy" summary="">Support Policy</a>
    - <a anchor="common" summary="">Common</a>
    - <a anchor="publisher" summary="">Publisher</a>
    - <a anchor="lang" summary="">Lang</a>
    - <a anchor="actions" summary="">Actions</a>
    - <a anchor="attributes" summary="">Attributes</a>
    - <a anchor="http-statuses" summary="">HTTP Statuses</a>
    - <a anchor="locales" summary="">Locales</a>
    - <a anchor="locale-list" summary="">Locale List</a>
    - <a anchor="native-locale-names" summary="">Native Locale Names</a>
    - <a anchor="native-country-names" summary="">Native Country Names</a>
    - <a anchor="native-currency-names" summary="">Native Currency Names</a>
    - <a anchor="json-fallback" summary="">JSON Fallback</a>

</tldr>

## Versioning Scheme

All our packages follow [Semantic Versioning](https://semver.org).
Major project releases occur when adding some functionality that breaks backward compatibility or when removing support
for [deprecated versions](https://laravel.com/docs/releases) of Laravel or its other first-party packages.
Minor and patch releases should never contain breaking changes.

## Support Policy

For all Lang projects, we follow the [Laravel support policy](https://laravel.com/docs/releases).

Since `Lang` project packages are not expected to have code that affects the security of the project, we are
basing this on the [scheduled maintenance completion dates](https://laravel.com/docs/releases#support-policy)
for Laravel projects and minor versions of [PHP](https://www.php.net).

### Common

| Laravel  | PHP                | Package | Dependencies                                                                |                 Status                  |
|----------|--------------------|---------|-----------------------------------------------------------------------------|:---------------------------------------:|
| 10       | 8.1, 8.2, 8.3      | `^5.0`  | Publisher 15<br/>Lang 13<br/>Attributes 2<br/>HTTP Statuses 3<br/>Locales 1 |     ![Supported](%badge-supported%)     |
| 10       | 8.1, 8.2           | `^4.0`  | Publisher 14<br/>Lang 13<br/>Attributes 2<br/>HTTP Statuses 3<br/>Locales 1 | ![Not Supported](%badge-not-supported%) |
| 8, 9, 10 | 8.1, 8.2           | `^3.0`  | Publisher 14<br/>Lang 12<br/>Attributes 2<br/>HTTP Statuses 3               | ![Not Supported](%badge-not-supported%) |
| 7, 8, 9  | 8.0, 8.1           | `^2.0`  | Publisher 13<br/>Lang 10<br/>Attributes 1<br/>HTTP Statuses 2               | ![Not Supported](%badge-not-supported%) |
| 7, 8, 9  | 7.3, 7.4, 8.0, 8.1 | `^1.0`  | Publisher 12<br/>Lang 10<br/>Attributes 1<br/>HTTP Statuses 2               | ![Not Supported](%badge-not-supported%) |

### Publisher

| Laravel  | PHP                | Package |                 Status                  |
|----------|--------------------|---------|:---------------------------------------:|
| 10       | 8.1, 8.2, 8.3      | `^15.0` |     ![Supported](%badge-supported%)     |
| 8, 9, 10 | 8.1, 8.2           | `^14.0` | ![Not Supported](%badge-not-supported%) |
| 7, 8, 9  | 8.0, 8.1           | `^13.0` | ![Not Supported](%badge-not-supported%) |
| 7, 8, 9  | 7.3, 7.4, 8.0, 8.1 | `^12.0` | ![Not Supported](%badge-not-supported%) |

### Lang

| Laravel        | PHP           | Publisher | Package | Dependencies                                                                                                                                                                                      |                 Status                  |
|----------------|---------------|-----------|---------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:---------------------------------------:|
| 10             | 8.1, 8.2, 8.3 | 14, 15    | `^13.0` | Breeze 1<br/>Cashier Stripe 13, 14<br/>Fortify 1<br/>Jetstream 2, 3, 4<br/>Nova 4<br/>Spark Aurelius 11, 12<br/>Spark Aurelius Mollie 2<br/>Spark Paddle *<br/>Stripe Stripe *<br/>UI 4           |     ![Supported](%badge-supported%)     |
| 9, 10          | 8.1, 8.2      | 14        | `^12.0` | Breeze 1<br/>Cashier Stripe 12, 13, 14<br/>Fortify 1<br/>Jetstream 1, 2, 3<br/>Nova 3, 4<br/>Spark Aurelius 11, 12<br/>Spark Aurelius Mollie 2<br/>Spark Paddle *<br/>Stripe Stripe *<br/>UI 3, 4 | ![Not Supported](%badge-not-supported%) |
| 6, 7, 8, 9, 10 | 8.1, 8.2      |           | `^11.0` | Breeze 1<br/>Cashier Stripe 12, 13<br/>Fortify 1<br/>Jetstream 1, 2<br/>Nova 3, 4<br/>Spark Paddle *<br/>Stripe Stripe *<br/>UI 1, 2, 3, 4                                                        | ![Not Supported](%badge-not-supported%) |
| 7, 8, 9        | 8.1, 8.2      |           | `^10.0` | Breeze 1<br/>Cashier Stripe 12, 13<br/>Fortify 1<br/>Jetstream 1<br/>Nova 3<br/>Spark Paddle *<br/>Stripe Stripe *<br/>UI 1, 2, 3                                                                 | ![Not Supported](%badge-not-supported%) |

### Actions

| Laravel | PHP           | Publisher | Package |             Status              |
|---------|---------------|-----------|---------|:-------------------------------:|
| 10      | 8.1, 8.2, 8.3 | 15        | `^1.0`  | ![Supported](%badge-supported%) |

### Attributes

| Laravel      | PHP                | Publisher | Package |                 Status                  |
|--------------|--------------------|-----------|---------|:---------------------------------------:|
| 10           | 8.1, 8.2, 8.3      | 15        | `^2.5`  |     ![Supported](%badge-supported%)     |
| 8, 9, 10, 11 | 8.1, 8.2           | 14        | `^2.0`  | ![Not Supported](%badge-not-supported%) |
| 7, 8, 9      | 7.3, 7.4, 8.0, 8.1 | 12, 13    | `^1.0`  | ![Not Supported](%badge-not-supported%) |

### HTTP Statuses

| Laravel  | PHP                | Publisher | Package |                 Status                  |
|----------|--------------------|-----------|---------|:---------------------------------------:|
| 10       | 8.1, 8.2, 8.3      | 15        | `^3.5`  |     ![Supported](%badge-supported%)     |
| 8, 9, 10 | 8.1, 8.2           | 14        | `^3.0`  | ![Not Supported](%badge-not-supported%) |
| 7, 8, 9  | 8.0, 8.1           | 13        | `^2.0`  | ![Not Supported](%badge-not-supported%) |
| 7, 8     | 7.3, 7.4, 8.0, 8.1 | 10        | `^1.0`  | ![Not Supported](%badge-not-supported%) |

### Locales

| PHP           | Package |             Status              |
|---------------|---------|:-------------------------------:|
| 8.1, 8.2, 8.3 | `^2.0`  | ![Supported](%badge-supported%) |
| 8.1, 8.2, 8.3 | `^1.0`  | ![Supported](%badge-supported%) |

### Locale List

| PHP           | Package |             Status              |
|---------------|---------|:-------------------------------:|
| 8.1, 8.2, 8.3 | `^1.0`  | ![Supported](%badge-supported%) |

### Native Locale Names

| PHP           | Package |             Status              |
|---------------|---------|:-------------------------------:|
| 8.1, 8.2, 8.3 | `^2.0`  | ![Supported](%badge-supported%) |
| 8.1, 8.2, 8.3 | `^1.0`  | ![Supported](%badge-supported%) |

### Native Country Names

| PHP           | Package |             Status              |
|---------------|---------|:-------------------------------:|
| 8.1, 8.2, 8.3 | `^1.0`  | ![Supported](%badge-supported%) |

### Native Currency Names

| PHP           | Package |             Status              |
|---------------|---------|:-------------------------------:|
| 8.1, 8.2, 8.3 | `^1.0`  | ![Supported](%badge-supported%) |

### JSON Fallback

| PHP                               | Package |             Status              |
|-----------------------------------|---------|:-------------------------------:|
| 7.2, 7.3, 7.4, 8.0, 8.1, 8.2, 8.3 | `^1.0`  | ![Supported](%badge-supported%) |
