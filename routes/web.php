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
Route::get('/profil', 'ChangerPasswordController@index')->middleware('verified', 'check');
Route::post('/profil', 'ChangerPasswordController@store')->name('change.password')->middleware('verified', 'check');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified', 'check');

Route::view('/error', 'error');
Route::resource('post', 'PostController')->middleware('verified', 'check');
Route::resource('user', 'UserController')->middleware('verified', 'check','membre');

Auth::routes(['verify'=> true]);


Route::get('/download/{file}', function ($file='') {
    return response()->download(storage_path('app/public/'.$file));
})->middleware('verified','check');

Route::post('post/search', 'PostController@search')->name('post.search')->middleware('verified', 'check');
Route::put('user/{user}', 'UserController@admin')->name('user.admin')->middleware('verified', 'check','membre');
Route::put('user/{users}', 'UserController@delAdmin')->name('user.delAdmin')->middleware('verified', 'check','membre');
Route::get('verification', 'UserController@getCheck')->middleware('verified', 'check','membre');
Route::put('verification/{user}', 'UserController@check')->name('user.check')->middleware('verified', 'check','membre');
Route::get('admin', 'AdminController@index')->name('admin')->middleware('verified', 'check','membre');
Route::put('admin/{admin}', 'AdminController@admin')->name('admin.add')->middleware('verified', 'check','membre');

Route::get('preview/{file}', 'PreviewController@index');


Route::get('role', 'RoleController@index' )->name('role.index')->middleware('auth','verified');
Route::get('role/gestion', 'RoleController@show' )->name('role.show')->middleware('auth','verified');
Route::get('role/gestion/create', 'RoleController@create' )->name('role.create')->middleware('auth','verified');
Route::post('role/gestion/create', 'RoleController@store' )->name('role.store')->middleware('auth','verified');
Route::put('role/{role}/add', 'RoleController@change')->name('role.change');
Route::delete('role/gestion/{role}', 'RoleController@destroy')->name('role.destroy')->middleware('auth','verified');
Route::delete('role/{role}', 'RoleController@delete')->name('role.delete')->middleware('auth','verified');

Route::get('budget', 'BudgetController@index')->name('budget.index')->middleware('verified', 'check','membre');

Route::get('budget/{budget}', 'DepController@index')->name('depense.index')->middleware('verified', 'check','membre');
Route::get('budget/{budget}/depense','DepController@create')->name('depense.create')->middleware('verified', 'check','membre');
Route::post('budget/{budget}/depense','DepController@store')->name('depense.store')->middleware('verified', 'check','membre');

Route::get('budget/{budget}/gain','GainController@create')->name('gain.create')->middleware('verified', 'check','membre');
Route::post('budget/{budget}/gain','GainController@store')->name('gain.store')->middleware('verified', 'check','membre');

Route::get('document', 'DocController@index')->name('doc.index')->middleware('verified', 'check','membre');
Route::get('document/add', 'DocController@create')->name('doc.add')->middleware('verified', 'check','membre');
Route::post('document/add', 'DocController@store')->name('doc.store')->middleware('verified', 'check','membre');

Route::get('document/{document}/list', 'DocController@show')->name('doc.show')->middleware('verified', 'check','membre');


Route::get('document/file/test', 'FileController@index')->name('file.index')->middleware('verified', 'check','membre');
Route::get('document/file/create', 'FileController@create')->name('file.add')->middleware('verified', 'check','membre');
Route::post('document/file/add', 'FileController@store')->name('file.store')->middleware('verified', 'check','membre');

Route::view('membre','membre.membre')->middleware('verified', 'check','membre');
