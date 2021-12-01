<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use App\Http\Controllers\ActionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\EmployeeController::class, 'index'])->name('home');

// Route::prefix('home')->group(function () {
//     Route::get('/', [EmployeeController::class, 'index'])->name('home');
//     Route::get('/create', [EmployeeController::class, 'create'])->name('create');
//     Route::put('/store', [EmployeeController::class, 'store'])->name('store');
//     Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('show');
//     Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
//     Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('update');
//     Route::get('/delete/{id}', [EmployeeController::class, 'destroy'])->name('delete');
// });

Route::resource('emp', EmployeeController::class);
Route::resource('customer', CustomerController::class);
Route::resource('act', ActionController::class);

Route::prefix('act')->group(function () {
    Route::post('store/{id}/{id2}', [ActionController::class, 'store'])->name('act.store');
});

Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('create/{id}', [CustomerController::class, 'createWithId'])->name('customer.createWithId');
    Route::post('store/{id}', [CustomerController::class, 'storeWithId'])->name('customer.storeWithId');
});
