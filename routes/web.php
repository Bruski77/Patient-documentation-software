<?php

use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

    Route::controller(PharmacyController::class)->group(function () {
        Route::get('/pharmacy/create', 'create')->name('pharmacy.create');
        Route::get('/pharmacy', 'index')->name('pharmacy.index');
        Route::post('/pharmacy', 'store')->name('pharmacy.store');
        Route::get('/pharmacy/{pharmacy}', 'show')->name('pharmacy.show');
        Route::patch('/pharmacy/{pharmacy}', 'update')->name('pharmacy.update');
    });
});


require __DIR__.'/auth.php';
