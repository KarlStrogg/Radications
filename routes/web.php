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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('radications', 'RadicationsController');

Route::group(['prefix' => 'parameters'], function(){
    Route::resource('typesprocess', 'TypesprocessController');

});

Route::group(['prefix' => 'admin'], function(){
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::put('users/status/{user}',
        ['as' => 'users.status', 'uses' => 'UsersController@status']);
});
