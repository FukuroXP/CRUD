<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/input', function () {
    return view('input');
});

Route::post('/crudgo', [\App\Http\Controllers\CrudController::class, 'store']);
Route::get('/show', [\App\Http\Controllers\CrudController::class, 'show'])->name('show');
Route::get('/crud_update/{id}', [\App\Http\Controllers\CrudController::class, 'edit']);
Route::post('/crudup/{id}', [\App\Http\Controllers\CrudController::class, 'update'])->name('crudup.edit');
Route::delete('/crud/{id}', [\App\Http\Controllers\CrudController::class, 'destroy'])->name('crud.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
