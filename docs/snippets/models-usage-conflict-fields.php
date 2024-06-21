<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use LaravelLang\Models\HasTranslations;

class Article extends Model
{
    use HasTranslations;

    protected $fillable = [
        'category_id',

        // Need to remove:
        'title',
        'description',
    ];
}
