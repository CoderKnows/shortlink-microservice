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

// admin - зарезервированное слово, нельзя использовать к качестве кода для редиректа
Route::prefix('admin')->group(function () {
    Route::redirect("", "/");
});

Route::redirect('/contacts', '/');
Route::redirect('/about', '/');

Route::prefix('/')->group(function () {
    Route::view('', 'welcome')->name('home');

    // если в контроллере биндится модель, через ":" указывается поле модели,
    // по которому идентифицировать данные в БД
    Route::get('/{redirect:code}', 'RedirectController@redirect')
        ->name('redirect')
        ->middleware('analytics.collect');
});
