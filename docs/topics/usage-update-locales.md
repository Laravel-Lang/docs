# Update

To update files, call the console command:

```Bash
%command-update%
```

Yes, that's all you need to do 🙂

This console command will detect the localizations installed in the application and update the files.

> Some minor versions of Laravel may remove keys from their repositories, causing them to accumulate in the application.
> This happens very rarely, but it does happen.
> 
> The localization update command only adds new or updates existing translation phrases.
> To remove unused phrases, use the console command [`%command-reset%`](usage-reset-locales.md).
