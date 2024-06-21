<?php

declare(strict_types=1);

use App\Models\Article;
use LaravelLang\LocaleList\Locale;

$page = Article::first();

$page->title;

$page->getTranslation('title');

$page->getTranslation('title', 'fr');
// or
$page->getTranslation('title', Locale::French);
