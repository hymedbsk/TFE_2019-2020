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

Route::get('/', 'ViewController@getview');
Route::get('/welcome','ViewController@getAcc')->name('welcome');
Route::post('/welcome', 'ViewController@postForm')->name('welcome.contact');
Route::view('/plateforme', 'plateforme');
Route::get('/profil', 'ChangerPasswordController@index');
Route::post('/profil', 'ChangerPasswordController@store')->name('change.password');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);

