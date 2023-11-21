# Install Plugins

> You can also see the list of available [official](plugins-official.md) plugins and created
> by [communities](plugins-community.md).
>
{style="note"}

For a manager to work, you need to do two things:

1. Install the package into your application. For example, `%install-lang%` or another package.
2. It's all 😊

Now, when the `%command-update%` command is executed, the manager will check the specified packages and
automatically update the files in your application.

If files with the same names exist in different packages, for example, `custom.php`, then during their processing all
keys from all files will be combined.

> For ease of development, use a ready-made
> [Translations Template](https://github.com/Laravel-Lang/translations-template).

Enjoy! 😊

<seealso style="cards">
    <category ref="plugins-lists">
        <a href="plugins-official.md">Official Plugins</a>
        <a href="plugins-community.md">Community Plugins</a>
    </category>
</seealso>
