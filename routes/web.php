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

Route::get('/', 'HomeController@index');
Route::post('/registry', 'UserController@store');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@authenticate');
Route::get('/logout', 'UserController@logout');

Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth')->name('dashboard');