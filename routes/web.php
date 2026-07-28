<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssetController;
use App\Models\Category;
use App\Http\Controllers\AssetAssignmentController;
use App\Http\Controllers\DashboardController;

Route::get('/test', function () {
    return Category::all();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('assets', AssetController::class);

    Route::resource('asset-assignments', AssetAssignmentController::class);

    Route::patch(
        'asset-assignments/{asset_assignment}/return',
        [AssetAssignmentController::class, 'return']
    )->name('asset-assignments.return');

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

});

require __DIR__.'/auth.php';
