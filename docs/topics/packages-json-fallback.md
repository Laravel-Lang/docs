# JSON Fallback

> The compatibility table can be viewed [here](release-notes.md#json-fallback).

This package solves the problem of using JSON translations in applications where the fallback locale is not English.

<snippet id="json-fallback-doesnt-allow">
    Out of the box, Laravel [doesn't allow](https://github.com/laravel/framework/issues/41565#issuecomment-1073572954) fallback translations for JSON keys.
    For example, when you call `__('Remember Me')`, you get `Remember Me` instead of `Se souvenir de moi` for French fallback language.
</snippet>

This package solves this problem.

To install, run the console command:

```Bash
%install-json-fallback-hotfix%
```
