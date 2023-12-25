<?php

use Illuminate\Support\Facades\Route;
use OsTheNeo\BelongsToMany\Http\Controllers\ResourceController;

Route::get('/{resource}/options/{relationship}/{optionsLabel}/{dependsOnValue?}/{dependsOnKey?}',
    [
        ResourceController::class, 'index',
    ]);

