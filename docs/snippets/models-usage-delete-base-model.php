<?php

declare(strict_types=1);

use App\Models\Article;

$page = Article::first();

$page->delete();
// or
$page->forceDelete();
