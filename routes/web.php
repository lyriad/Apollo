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

Route::group([ 'namespace' => 'App\Http\Controllers' ], function () {

    Route::group([ 'prefix' => '/auth' ], function () {
        Route::view('/login', 'auth.login')->name('auth.login');
        Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    });
    
    Route::group([ 'prefix' => '/', 'middleware' => ['auth'] ], function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::group([ 'prefix' => '/patients' ], function () {
            Route::get('/', 'PatientController@index')->name('patients.index');
            Route::get('/create', 'PatientController@create')->name('patients.create');
        });

        Route::group([ 'prefix' => '/bpreading' ], function () {
            Route::get('/', 'HomeController@index')->name('bpreading.index');
        });
    });
});
