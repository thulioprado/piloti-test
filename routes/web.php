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
Route::group([
    'middleware' => ['guest', 'ajax']
], function() {

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    
    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@save');

});

/**
 * User routes
 */
Route::group([
    'middleware' => ['auth', 'ajax'],
    'prefix'     => 'panel'
], function() {

    Route::get('/', 'PanelController@index');
    Route::get('logout', 'PanelController@logout');
    
    Route::get('profile', 'PanelController@profile');
    Route::post('profile', 'PanelController@save_profile');

    Route::group([
        'middleware' => 'admin',
        'prefix'     => 'admin'
    ], function() {

        Route::get('/', 'AdminController@index');
        Route::get('users', 'AdminController@users');
        Route::get('deleted', 'AdminController@deleted');
        Route::get('edit/{id}', 'AdminController@edit');
        Route::post('edit/{id}', 'AdminController@save');
        Route::get('delete/{id}', 'AdminController@confirm');
        Route::post('delete/{id}', 'AdminController@delete');
        Route::get('restore/{id}', 'AdminController@restore');

    });

});