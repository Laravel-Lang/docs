<?php

declare(strict_types=1);

use App\Models\Article;
use LaravelLang\LocaleList\Locale;

$page = Article::first();

$page->hasTranslated('title');

$page->hasTranslated('title', 'fr');
// or
$page->hasTranslated('title', Locale::French);
