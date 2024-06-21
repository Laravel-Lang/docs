<?php

declare(strict_types=1);

use App\Models\Article;
use LaravelLang\LocaleList\Locale;

$page = Article::first();

$page->delete();
// or
$page->forceDelete();
