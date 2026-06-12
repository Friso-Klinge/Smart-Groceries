<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/my-lists', function () {
    return view('my-lists');
})->middleware(['auth', 'verified'])->name('my-lists');

Route::get('/route', function () {
    return view('route');
})->middleware(['auth', 'verified'])->name('route');

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