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



Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user.index');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'editar'])->name('admin.user.editar');
Route::put('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.user.edit');
Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'eliminar'])->name('admin.user.eliminar');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.user.delete');

Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.user.create');