<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

// pages
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');

// authentication
Route::get('/login', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name(
  'auth-register-basic'
);

// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.get');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.get');
// Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register');

Route::get('/raw-materials', [App\Http\Controllers\RawMaterialController::class, 'index'])->name('rawMaterials');
Route::get('/raw-materials/create', [App\Http\Controllers\RawMaterialController::class, 'create'])->name(
  'rawMaterials.create'
);
Route::post('/raw-materials', [App\Http\Controllers\RawMaterialController::class, 'store'])->name('rawMaterials.store');
Route::get('/raw-materials/{id}/edit', [App\Http\Controllers\RawMaterialController::class, 'edit'])->name(
  'rawMaterials.edit'
);
Route::put('/raw-materials/{id}', [App\Http\Controllers\RawMaterialController::class, 'update'])->name(
  'rawMaterials.update'
);

Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('suppliers');
Route::get('/suppliers/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [App\Http\Controllers\SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{id}/edit', [App\Http\Controllers\SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('suppliers.update');

Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers');
Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');

Route::get('/order-nos', [App\Http\Controllers\OrderNoController::class, 'index'])->name('orderNos');
Route::get('/order-nos/create', [App\Http\Controllers\OrderNoController::class, 'create'])->name('orderNos.create');
Route::post('/order-nos', [App\Http\Controllers\OrderNoController::class, 'store'])->name('orderNos.store');
Route::get('/order-nos/{id}/edit', [App\Http\Controllers\OrderNoController::class, 'edit'])->name('orderNos.edit');
Route::put('/order-nos/{id}', [App\Http\Controllers\OrderNoController::class, 'update'])->name('orderNos.update');
