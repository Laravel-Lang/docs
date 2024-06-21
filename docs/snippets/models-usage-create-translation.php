<?php

declare(strict_types=1);

$page = Article::first();

$page->title = 'New value';

$page->setTranslation('title', 'New value');

$page->setTranslation('title', 'New value', 'fr');

$page->fill([
    'title' => 'New value',
]);

$page->save();

Article::create([
    'title' => 'New value',
]);
