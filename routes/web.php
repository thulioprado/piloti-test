<?php

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
    return view('index');
});

/**
 * Guest routes
 */
Route::middleware(['guest', 'ajax'])->group(function() {

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    
    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@save');

});

/**
 * User routes
 */
Route::middleware(['auth', 'ajax'])->group(function() {

    Route::prefix('panel')->group(function() {

        Route::get('/', 'PanelController@index');
        Route::get('logout', 'PanelController@logout');
        
        Route::get('profile', 'PanelController@profile');
        Route::post('profile', 'PanelController@save_profile');

    });
});