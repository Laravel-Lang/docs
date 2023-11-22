# Management

> <include from="packages-json-fallback.md" element-id="json-fallback-doesnt-allow" />
>
{style="warning"}

Almost all console commands accept an array of localizations as a parameter.

For example:

```Bash
%command-base% %locale-many%
%command-base% %locale-one%
%command-base%
```

Where:

- `%locale-many%` it's a list of locales separated by a space;
- `%locale-one%` it's also possible to specify a single localization name;
- if the parameter is not passed during the call, the script will ask two questions:
    - `Do you want to %s all localizations?`, when `%s` is `install`, `remove` or `reset`;
    - If `no`, then next question
      is `Select localizations to add (specify the necessary localizations separated by commas)`.

> When performing any work with files (`install`, `uninstall`, `reset` and `update`), in addition to php files, work
> with json files, including translation for
> <include from="lists-laravel-projects.topic" element-id="lists-laravel-projects-inline"/>
> , will also be automatically performed.
