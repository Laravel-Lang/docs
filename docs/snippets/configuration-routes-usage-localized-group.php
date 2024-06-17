<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

app('router')->localizedGroup(function () {
    app('router')->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
});

Route::localizedGroup(function () {
    app('router')->get('foo/{bar}', function (string $bar) {
        return response()->json([
            $bar => __('Foo'),
        ]);
    });
});
