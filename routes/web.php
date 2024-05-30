<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layout.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [TemplateController::class, 'index'])->name('home');

//
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');

Route::get('/sales', [SalesController::class, 'index'])->name('sales');

Route::get('/products', [StockController::class, 'index'])->name('products');
require __DIR__.'/auth.php';
