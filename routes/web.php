<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\AdressesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('home');;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('citizens', CitizenController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])->middleware(['auth', 'verified']);

Route::resource('adresses', AdressesController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
