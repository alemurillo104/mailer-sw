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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/usuario', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user.index');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'editar'])->name('admin.user.editar');
Route::put('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.user.edit');