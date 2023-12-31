<?php

declare(strict_types=1);

use DragonCode\Support\Facades\Filesystem\File;
use DragonCode\Support\Facades\Helpers\Str;

require 'autoload.php';

if (empty($argv[1])) {
    throw new RuntimeException('Unknown directory at parameter #1');
}

$packages = array_map(fn (string $name) => 'statuses_' . $name . '_', [
    'actions',
    'attributes',
    'http_statuses',
    'lang',
]);

$path = __DIR__ . '/../' . $argv[1] . '/';

foreach (File::names($path) as $name) {
    if (Str::startsWith($name, $packages)) {
        File::ensureDelete($path . $name);
    }
}
