<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use LaravelLang\Models\Eloquent\Translation;
use LaravelLang\Models\HasTranslations;

class Article extends Model
{
    use HasTranslations;
}

class ArticleTranslation extends Translation
{
    protected $fillable = [
        'title',
    ];
}

$page = Article::first();

$page->isTranslatable('title'); // true
$page->isTranslatable('description'); // false
