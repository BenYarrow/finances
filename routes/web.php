<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AccountsController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::name('accounts.')->prefix('/accounts')->group(function () {
        // index (show all accounts)
        Route::get('/', [AccountsController::class, 'index'])->name('index');

        // show create account form (unless in a modal)
        Route::get('/create', [AccountsController::class, 'create'])->name('create');
        // save created account from form
        Route::post('/', [AccountsController::Class, 'store'])->name('store');

        // save changes to a specific account
        Route::post('/{account}', [AccountsController::class, 'update'])->name('update');

        // delete account
        Route::delete('/{account}', [AccountsController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
