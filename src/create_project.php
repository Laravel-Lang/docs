<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use LaravelLang\LocaleList\Locale;

require 'autoload.php';

$project = $argv[1] ?? false;
$package = $argv[2] ?? false;

if (! $project) {
    echo 'You must indicate the project name with the first parameter (like "My Package")';

    exit;
}

if (! $package) {
    echo 'You must indicate the package name with the second parameter (like "my-package" - this is what is indicated after `laravel-lang/...`)';

    exit;
}

/*
 * Manual:
 * 
 * 1. Add package to `src/clean_algolia.php`.
 * 2. Add package to `src/statuses.php`.
 * 3. Add package to `src/team.php`.
 */

function createPage(string $stub, string $target, string $project, string $package, array $replaces = []): void
{
    $content = file_get_contents(__DIR__ . '/../stubs/' . $stub);

    $content = Str::replace(
        array_merge(['{project}', '{package}'], array_keys($replaces)),
        array_merge([$project, $package], array_values($replaces)),
        $content
    );

    file_put_contents(__DIR__ . '/../docs/topics/' . $target, $content);

    echo "- The $target file was created\n";
}

function createStatusPages(string $project, string $package): void
{
    foreach (Locale::cases() as $locale) {
        createPage('statuses-page.md', "statuses-$package-$locale->value.md", $project, $package, [
            '{localeName}' => $locale->name,
            '{locale}'     => $locale->value,
        ]);
    }
}

function pushToList(string $filename, string $search, iterable|string $replace, bool $prependSearch = false): void
{
    $content = file_get_contents(__DIR__ . '/../docs/' . $filename);

    $replace = collect($replace)->when(
        $prependSearch,
        fn (Collection $items) => $items->prepend($search),
        fn (Collection $items) => $items->push($search)
    )->join("\n");

    $content = Str::replace($search, $replace, $content);

    file_put_contents(__DIR__ . '/../docs/' . $filename, $content);
}

function pushToMenu(string $project, string $package): void
{
    $items = collect(Locale::values())
        ->sort()
        ->map(
            fn (string $locale) => "            <toc-element topic=\"statuses-$package-$locale.md\" />"
        )
        ->prepend(
            "        <toc-element toc-title=\"$project\" topic=\"statuses-$package.md\" sort-children=\"ascending\">"
        )
        ->push(
            '        </toc-element>'
        );

    pushToList('laravel-lang.tree', '<toc-element topic="statuses.topic">', $items, true);
}

// Run
createPage('packages.xml', "packages-$package.topic", $project, $package);
createPage('statuses-main.md', "statuses-$package.md", $project, $package);

createStatusPages($project, $package);
pushToMenu($project, $package);

pushToList(
    'labels.list',
    '</labels>',
    "    <secondary-label id=\"package-$package\" name=\"unknown\" color=\"purple\">Latest version is unknown</secondary-label>"
);

pushToList(
    'v.list',
    '</vars>',
    [
        "    <var name=\"install-$package\" value=\"composer require --dev laravel-lang/$package\" />",
        "    <var name=\"package-$package\" value=\"laravel-lang/$package\" />",
        "    <var name=\"repository-title-$package\" value=\"$project\" />",
    ]
);
