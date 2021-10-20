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
    
    Route::group([ 'prefix' => '/', 'middleware' => ['auth']], function ( ) {
        Route::get('/', 'HomeController@index')->name('home');
    });
});
