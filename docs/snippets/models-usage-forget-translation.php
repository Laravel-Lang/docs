<?php

declare(strict_types=1);

use App\Models\Article;
use LaravelLang\LocaleList\Locale;

$page = Article::first();

$page->forgetTranslation('fr');
// or
$page->forgetTranslation(Locale::French);

$page->forgetAllTranslations();
