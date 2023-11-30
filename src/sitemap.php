<?php

declare(strict_types=1);

use DragonCode\Core\Xml\Facades\Xml;

require 'autoload.php';

$host   = 'https://laravel-lang.com/';
$source = __DIR__ . '/../dir/Map.jhm';

if (! file_exists($source)) {
    throw new RuntimeException('File not exists: ' . $source);
}

$map = simplexml_load_file($source);

$dom = Xml::init('urlset', ['xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9'])->setSkipEmptyAttributes();

$urlset = $dom->makeItem('urlset', '');

$registry = [];

foreach ($map as $item) {
    $value = (string) $item->attributes()['url'];

    if (in_array($value, $registry, true)) {
        continue;
    }
    else {
        $registry[] = $value;
    }

    $url = $dom->makeItem('url', '');

    $url->appendChild($dom->makeItem('loc', $host . $value));
    $url->appendChild($dom->makeItem('lastmod', date('c')));
    $url->appendChild($dom->makeItem('changefreq', 'daily'));
    $url->appendChild($dom->makeItem('priority', 0.5));

    $dom->appendToRoot($url);
}

file_put_contents(__DIR__ . '/../sitemap.xml', $dom->get());
