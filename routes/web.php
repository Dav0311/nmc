<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormbuilderController;

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
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('form_builder/', [FormbuilderController::class, 'index'])->name('form_builder');
Route::get('formBuilder/create/', [FormbuilderController::class, 'create']);
Route::get('formBuilder/edit/{id}', [FormbuilderController::class, 'edit'])->name('form_builder_edit_form');
Route::put('formBuilder/update/{id}', [FormbuilderController::class, 'update']);
Route::delete('formBuilder/delete/{id}', [FormbuilderController::class, 'destroy']);
Route::post('formBuilder/create_form', [FormbuilderController::class, 'store'])->name('create_form_post');
Route::get('formBuilder/show_form/{id}', [FormbuilderController::class, 'show'])->name('show_form');
Route::post('formBuilder/create_form_field/{id}', [FormbuilderController::class, 'addFormField'])->name('create_form_field');
Route::get('formBuilder/form/{id}', [FormbuilderController::class, 'viewForm'])->name('view_form');
Route::get('formBuilder/edit_form/{id}', [FormbuilderController::class,'editFormField'])->name('edit_form_field');
Route::put('formBuilder/update_form_field/{id}', [FormbuilderController::class,'updateFormField'])->name('update_form_field');
Route::get('formBuilder/form/response/{form_id}', [FormbuilderController::class, 'viewResponse'])->name('view_response');
Route::get('formBuilder/form/response/detail/{id}', [FormbuilderController::class, 'viewDetailResponse'])->name('view_response_detail');
Route::post('formBuilder/form/store_response/{form_id}', [FormbuilderController::class, 'storeResponse'])->name('store_response');
Route::get('formBuilder/form/delete_response/{form_id}', [FormbuilderController::class, 'destroyResponse'])->name('destroy_response');

require __DIR__.'/auth.php';
