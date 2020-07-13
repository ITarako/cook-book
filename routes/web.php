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

//Route::view('/', 'site.index');
//Route::redirect('/redirect', '/');
//Route::permanentRedirect('/google', 'https://google.com');

Route::get('/', 'SiteController@index')->name('index');
Route::match(['get', 'post'], '/login', 'SiteController@login')->name('login');
Route::get('/logout', 'SiteController@logout')->name('logout');

Route::resource('recipe', 'RecipeController');
