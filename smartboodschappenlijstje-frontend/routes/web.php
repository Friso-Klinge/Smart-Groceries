<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/my-lists', [ShoppingListController::class, 'index'])->name('my-lists');
    Route::post('/my-lists', [ShoppingListController::class, 'store'])->name('shopping-lists.store');
    Route::post('/my-lists/{shoppingList}/activate', [ShoppingListController::class, 'activate'])
        ->name('shopping-lists.activate');
    Route::delete('/my-lists/{shoppingList}', [ShoppingListController::class, 'destroy'])
        ->name('shopping-lists.destroy');
    Route::get('/results', ResultsController::class)->name('results');
    Route::get('/route', RouteController::class)->name('route');
    Route::post('/cart/{productId}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/items/{item}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api/openroute-key', function () {
    return response()->json([
        'key' => config('services.openroute.key')
    ]);
})->middleware(['auth']);

require __DIR__.'/auth.php';
