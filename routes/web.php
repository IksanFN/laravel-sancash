<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('users')->name('users.')->group(function() {
       Route::get('/', [UserController::class, 'index'])->name('index'); 
       Route::get('/create', [UserController::class, 'create'])->name('create'); 
       Route::post('/create', [UserController::class, 'store'])->name('store'); 
       Route::get('/edit/{user:uuid}', [UserController::class, 'edit'])->name('edit'); 
       Route::put('/edit/{user:uuid}', [UserController::class, 'update'])->name('update'); 
       Route::delete('/delete/{user:uuid}', [UserController::class, 'destroy'])->name('destroy'); 
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
