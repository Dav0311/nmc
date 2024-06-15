<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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
Route::get('/honeypot', [TemplateController::class, 'honeypot'])->name('honeypot');
Route::post('/honeypost', [TemplateController::class, 'honeypotBlock'])->name('honeypost')->middleware(ProtectAgainstSpam::class);;

//
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');

Route::get('/sales/home', [SalesController::class, 'index'])->name('sales');

Route::get('/categories/home', [CategoriesController::class, 'index'])->name('categories');
//Route::resource('/category', CategoriesController::class);
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('create_categories');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('store_categories');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('edit_categories');
Route::put('/categories/update', [CategoriesController::class, 'update'])->name('update_categories');
Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('delete_categories');

Route::get('/products', [StockController::class, 'index'])->name('products');
require __DIR__.'/auth.php';
