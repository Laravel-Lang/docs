# Remove

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
