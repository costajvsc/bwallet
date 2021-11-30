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
        Route::get('/', 'PiggyBankController@index');
        Route::post('/', 'PiggyBankController@store');

        Route::get('/edit/{id}', 'PiggyBankController@edit');
        Route::patch('/update', 'PiggyBankController@update');

        Route::get('/delete/{id}', 'PiggyBankController@delete');
        Route::delete('/destroy', 'PiggyBankController@destroy');
    });

    Route::prefix('/category')->group(function (){
        Route::get('/', 'CategoryController@index');
        Route::post('/', 'CategoryController@store');

        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::patch('/update', 'CategoryController@update');

        Route::get('/delete/{id}', 'CategoryController@delete');
        Route::delete('/destroy', 'CategoryController@destroy');
    });

    Route::prefix('/payment')->group(function (){
        Route::get('/', 'PaymentController@index');
        Route::post('/', 'PaymentController@store');

        Route::get('/edit/{id}', 'PaymentController@edit');
        Route::patch('/update', 'PaymentController@update');

        Route::get('/delete/{id}', 'PaymentController@delete');
        Route::delete('/destroy', 'PaymentController@destroy');
    });

    Route::prefix('/transaction')->group(function (){
        Route::get('/', 'TransactionController@index');
        Route::post('/', 'TransactionController@store');

        Route::get('/edit/{id}', 'TransactionController@edit');
        Route::patch('/update', 'TransactionController@update');

        Route::get('/delete/{id}', 'TransactionController@delete');
        Route::delete('/destroy', 'TransactionController@destroy');
    });

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});

Route::get('/', 'HomeController@index');
Route::post('/registry', 'UserController@store');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@authenticate');
Route::get('/logout', 'UserController@logout');

