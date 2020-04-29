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
    return view('accueil');
});


Route::post('/', 'ContactController@postForm')->name('contact.form');
Route::view('/plateforme', 'plateforme');
Route::get('/profil', 'ChangerPasswordController@index')->middleware('verified');
Route::post('/profil', 'ChangerPasswordController@store')->name('change.password')->middleware('verified');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::resource('post', 'PostController')->middleware('verified');
Route::resource('user', 'UserController')->middleware('verified');

Auth::routes(['verify'=> true]);


Route::get('/download/{file}', function ($file='') {
    return response()->download(storage_path('app/public/'.$file));
})->middleware('verified');

Route::post('post/search', 'PostController@search')->name('post.search');
Route::put('user/{id}', 'UserController@admin')->name('user.admin');
Route::put('user/{user}', 'UserController@delAdmin')->name('user.delAdmin');
Route::get('verification', 'UserController@getCheck');
Route::put('verification/{user}', 'UserController@check')->name('user.check');

Route::get('role', 'RoleController@index' )->name('role.index');
Route::get('role/gestion', 'RoleController@show' )->name('role.show');
Route::get('role/gestion/create', 'RoleController@create' )->name('role.create');
Route::post('role/gestion/create', 'RoleController@store' )->name('role.store');
Route::post('role/{role}/role', 'RoleController@change')->name('role.change');
Route::delete('role/gestion/{role}', 'RoleController@destroy')->name('role.delete');
Route::get('test', function () {

$User = App\User::first();
$Roles = App\Role::first();
$User->roles()->attach($Roles);
});
