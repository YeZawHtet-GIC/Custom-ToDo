<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomTodoController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customs/index', [CustomTodoController::class, 'index'])->name('customs.index');
Route::post('/customs/store', [CustomTodoController::class, 'store'])->name('customs.store');
Route::put('/customs/update/{id}', [CustomTodoController::class, 'update'])->name('customs.update');
Route::get('/customs/edit/{id}', [CustomTodoController::class, 'edit'])->name('customs.edit');
Route::get('/customs/delete/{id}', [CustomTodoController::class, 'destroy'])->name('customs.delete');
Route::delete('/customs/delete/{id}', [CustomTodoController::class, 'destroy'])->name('customs.delete');
Route::get('/customs/show/{id}', [CustomTodoController::class, 'show'])->name('customs.show');
