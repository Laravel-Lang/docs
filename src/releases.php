<?php

declare(strict_types=1);

use DragonCode\Core\Xml\Facades\Xml;
use GuzzleHttp\Client;

require 'autoload.php';

function label(string $type, string $color, string $id, ?string $short, string $name, string $description): array
{
    return compact('type', 'color', 'id', 'short', 'name', 'description');
}

$labels = [
    label('primary', 'tangerine', 'alpha', 'α', 'Alpha', 'The project is at the alpha testing stage'),
    label('primary', 'strawberry', 'beta', 'β', 'Beta', 'The project is at the beta testing stage'),
    label('primary', 'purple', 'rc', 'RC', 'Release Candidate', 'The project is being prepared for release'),
    label('primary', 'blue', 'stable', 'S', 'Stable', 'A stable version of the project has been released'),
];

function request(string $uri, ?array $default = null): ?array
{
    try {
        $client = new Client([
            'base_uri' => 'https://api.github.com',
            'headers'  => [
                'Authorization' => 'Bearer ' . ($_SERVER['COMPOSER_TOKEN'] ?? ''),
            ],
        ]);

        $response = $client->get($uri);

        if ($response->getStatusCode() < 400) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return $default;
    } catch (Throwable) {
        return $default;
    }
}

function version(string $fullName): ?string
{
    if ($version = request("/repos/$fullName/releases/latest")) {
        return $version['name'];
    }

    $versions = request("/repos/$fullName/releases", []);

    foreach ($versions as $version) {
        if ($version['draft'] || $version['prerelease']) {
            continue;
        }

        return $version['name'];
    }

    foreach ($versions as $version) {
        if ($version['draft']) {
            continue;
        }

        return $version['name'];
    }

    return null;
}

function toSkip(array $repository): bool
{
    return ($repository['private'] ?? false)
        || ($repository['is_template'] ?? false)
        || ($repository['visibility'] ?? 'public') !== 'public'
        || str_starts_with($repository['name'] ?? '', '.');
}

if (! $repositories = request('orgs/Laravel-Lang/repos')) {
    throw new RuntimeException('API rate limit exceeded');
}

foreach ($repositories as $repository) {
    if (toSkip($repository)) {
        continue;
    }

    if (! $version = version($repository['full_name'])) {
        continue;
    }

    $labels[] = label(
        type       : 'secondary',
        color      : 'purple',
        id         : 'package-' . $repository['name'],
        short      : null,
        name       : $version,
        description: "Latest version is $version"
    );
}

$dom = Xml::init('labels', [
    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',

    'xsi:noNamespaceSchemaLocation' => 'https://resources.jetbrains.com/writerside/1.0/labels.xsd',
])->setSkipEmptyAttributes();

$dom->doctype('labels', '', 'https://resources.jetbrains.com/writerside/1.0/labels-list.dtd');

foreach ($labels as $label) {
    $type = $label['type'];

    $item = $dom->makeItem("$type-label", $label['description']);

    $item->setAttribute('id', $label['id']);
    $item->setAttribute('name', $label['name']);
    $item->setAttribute('color', $label['color']);

    if ($short = $label['short']) {
        $item->setAttribute('short-name', $short);
    }

    $dom->appendToRoot($item);
}

file_put_contents(__DIR__ . '/../docs/labels.list', $dom->get());
