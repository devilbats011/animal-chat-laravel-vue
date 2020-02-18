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


Auth::routes();

// Route::get('/', 'ChatsController@index');
Route::get('/', 'AnimalUserController@index');
Route::redirect('/t3', '/');
Route::redirect('/t2', '/');
Route::resource('animal', 'AnimalUserController');
Route::post('animal/user','AnimalUserController@storeUser');
// Route::post('/checkmyuser','AnimalUserController@yyxxx');


Route::get('/home', 'ChatsController@index');
Route::get('messages/{id}', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('checking-user',"AnimalUserController@xxx");

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');