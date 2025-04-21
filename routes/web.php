<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

     Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
     Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
     Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
     Route::get('/transaction/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
     Route::put('/transaction/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
     Route::delete('/transaction/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

     


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
