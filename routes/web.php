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
    return view('guest.welcome');
});

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin') //cartella controller
    ->prefix('admin') //prefisso uri
    ->name('admin.') //name rotte
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('categories', 'CategoryController');
        Route::get('/myposts', 'PostController@indexUser')->name('posts.indexUser');
        Route::resource('posts', 'PostController');
    });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
