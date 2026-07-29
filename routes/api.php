<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AssetController;

Route::prefix('v1')->group(function () {
    Route::get('/assets', [AssetController::class, 'index']);
});