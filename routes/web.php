<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::name('accounts.')->prefix('/accounts')->group(function () {
        Route::get('/', [AccountsController::class, 'index'])->name('index');

        Route::get('/create', [AccountsController::class, 'create'])->name('create');
        Route::post('/', [AccountsController::Class, 'store'])->name('store');

        // Route::get('/{account}/edit', [AccountsController::class, 'edit'])->name('edit');
        // Route::get('/{account}/edit', [AccountsController::class, 'edit'])->name('edit');
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
