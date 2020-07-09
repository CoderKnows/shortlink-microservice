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

Route::view('/', 'welcome')->name('home');

Route::prefix('r')->group(function () {
    // без кода редиректим на главную
    Route::redirect('', '/');

    // если в контроллере биндится модель, через ":" указывается поле модели,
    // по которому идентифицировать данные в БД
    Route::get('/{redirect:code}', 'RedirectController@redirect')
        ->name('redirect')
        ->middleware('analytics.collect');
});

