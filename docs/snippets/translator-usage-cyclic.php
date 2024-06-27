<?php

declare(strict_types=1);

use LaravelLang\Translator\Integrations\Deepl;
use LaravelLang\Translator\Integrations\Google;
use LaravelLang\Translator\Integrations\Yandex;

return [
    'translators' => [
        'channels' => [
            'google' => [
                'translator' => Google::class,
                'enabled'    => true,
            ],

            'deepl' => [
                'translator' => Deepl::class,
                'enabled'    => true,

                'credentials' => [
                    'key' => 'deepl-secret-key',
                ],
            ],

            'yandex' => [
                'translator' => Yandex::class,
                'enabled'    => false,

                'credentials' => [
                    'key'    => 'yandex-secret-key',
                    'folder' => 'yandex-folder-id',
                ],
            ],
        ],
    ],
];
