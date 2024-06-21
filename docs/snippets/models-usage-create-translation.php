<?php

declare(strict_types=1);

use App\Models\Article;
use LaravelLang\LocaleList\Locale;

$page = Article::first();

$page->title = 'New value';

$page->setTranslation('title', 'New value');

$page->setTranslation('title', 'New value', 'fr');
// or
$page->setTranslation('title', 'New value', Locale::French);

$page->fill([
    'title' => 'New value',
]);

$page->save();

Article::create([
    'title' => 'New value',
]);
