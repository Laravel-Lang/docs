# Managing locales

## Adding a locale

You can install the required locales by calling the console command `%command-add-empty%`,
passing it one or more locale codes, separated by a space:

```Bash
%command-add%
%command-add-many%
```

If the target files exist, you will be asked what to do in this case - skip installing the files or replace them.

If these files contain keys that you added, it is recommended to skip them, since the `%command-update%` command will be
able to update the files without deleting your code.

## Update a locale

To update files, call the console command:

```Bash
%command-update%
```

## Reset a locale

To reset files to default state, use the console command:

```Bash
%command-reset%
```

As a result, all target files will be cleared of those keys that are not defined by **%instance%** packages or
installed [third-party plugins](plugins-community.md).

## Remove a locale

> When this command is executed, the entire locale folder with all files is deleted except default and fallback locales.
>
{style="warning"}

To delete localizations, you must use `%command-remove-empty%` command, passing the letter abbreviations into it:

```Bash
%command-remove-many%
```

If you do not specify arguments when passing parameters, then an interactive question will be displayed in the console
with a choice of localizations from among the available ones.

```Bash
%command-remove%
```

By default, the command will return an error message when trying to remove a protected locale.

Protected locales are the set codes in the `locale` and `fallback_locale` parameters of the `config/app.php` file.

To force the deletion of a protected localization, use the `force` option:

```Bash
%command-remove-force%
```
