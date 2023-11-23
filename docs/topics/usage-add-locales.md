# Add

> A list of available locale codes can be found [here](available-locales-list.md).
>
{style="note"}

You can install the required locales by calling the console command `%command-add-empty%`,
passing it one or more locale codes, separated by a space:

```Bash
%command-add% %locale-many%
%command-add% %locale-one%
```

If the target files exist, you will be asked what to do in this case - skip installing the files or replace them.

If these files contain keys that you added, it is recommended to skip them, since the `%command-update%` command will be
able to update the files without deleting your code.
