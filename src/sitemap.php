<?php

declare(strict_types=1);

use DragonCode\Core\Xml\Facades\Xml;

require 'autoload.php';

$host = 'https://laravel-lang.com/';

$map = simplexml_load_file(__DIR__ . '/../dir/Map.jhm');

$dom = Xml::init('urlset', ['xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9'])->setSkipEmptyAttributes();

$urlset = $dom->makeItem('urlset', '');

foreach ($map as $item) {
    foreach ($item->attributes() as $key => $value) {
        if ($key === 'url') {
            $url = $dom->makeItem('url', '');

            $url->appendChild($dom->makeItem('loc', $host . $value));
            $url->appendChild($dom->makeItem('lastmod', date('c')));
            $url->appendChild($dom->makeItem('changefreq', 'daily'));
            $url->appendChild($dom->makeItem('priority', 0.8));

            $urlset->appendChild($url);
        }
    }
}

$dom->appendToRoot($urlset);

file_put_contents(__DIR__ . '/../sitemap.xml', $dom->get());
