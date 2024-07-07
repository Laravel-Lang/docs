<?php

declare(strict_types=1);

use App\Models\Article;
use LaravelLang\LocaleList\Locale;

$post = Article::first();

$titles = [
    'fr' => 'Mettre à jour & continuer à éditer',
    'en' => 'Update & Continue Editing',
    'de' => 'Aktualisieren & Weiterbearbeiten',
];

$descriptions = collect([
    Locale::French->value => 'Met à jour les informations et continue d\'éditer le message',
    Locale::German->value => 'Aktualisiert die Informationen und bearbeitet den Beitrag weiter',
]);

// Option 1
foreach ($titles as $locale => $value) {
    $post->setTranslation('title', $value, $locale);
}

foreach ($descriptions as $locale => $value) {
    $post->setTranslation('description', $value, $locale);
}

// Option 2
$post->setTranslations('title', $titles);
$post->setTranslations('description', $descriptions);

$post->fill([
    'title'       => $titles,
    'description' => $descriptions,
]);

Article::create([
    'title'       => $titles,
    'description' => $descriptions,
]);
