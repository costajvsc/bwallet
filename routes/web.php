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

Route::middleware(['auth'])->group(function () {
    Route::prefix('/piggy-bank')->group(function (){
        Route::get('/', 'PiggyBankController@index')->name('piggies');
        Route::post('/', 'PiggyBankController@store');

        Route::get('/edit/{id}', 'PiggyBankController@edit');
        Route::patch('/update', 'PiggyBankController@update');

        Route::get('/delete/{id}', 'PiggyBankController@delete');
        Route::delete('/destroy', 'PiggyBankController@destroy');
    });

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});

Route::get('/', 'HomeController@index');
Route::post('/registry', 'UserController@store');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@authenticate');
Route::get('/logout', 'UserController@logout');

