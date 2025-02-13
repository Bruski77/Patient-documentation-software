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
        Route::get('/pharmacy', 'create')->name('pharmacy');
        Route::post('/pharmacy', 'store')->name('pharmacy.store');
    });
});

Route::get('/external-data', function () {
  include resource_path('lgas.php');
   return response()->json($lga);
});
require __DIR__.'/auth.php';
