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
Route::get('/profil', 'ChangerPasswordController@index')->middleware('verified', 'check','auth');
Route::post('/profil', 'ChangerPasswordController@store')->name('change.password')->middleware('verified', 'check','auth');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified', 'check');

Route::view('/error', 'error');
Route::resource('post', 'PostController')->middleware('verified', 'check','auth');
Route::resource('user', 'UserController')->middleware('verified', 'check','membre','auth');

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


Route::get('role', 'RoleController@index' )->name('role.index')->middleware('auth','verified','president');
Route::get('role/gestion', 'RoleController@show' )->name('role.show')->middleware('auth','verified','president');
Route::get('role/gestion/create', 'RoleController@create' )->name('role.create')->middleware('auth','verified','superadmin');
Route::post('role/gestion/create', 'RoleController@store' )->name('role.store')->middleware('auth','verified','superadmin');
Route::put('role/{role}/add', 'RoleController@change')->name('role.change')->middleware('auth','verified','president');
Route::delete('role/gestion/{role}', 'RoleController@destroy')->name('role.destroy')->middleware('auth','verified','president');
Route::delete('role/{role}', 'RoleController@delete')->name('role.delete')->middleware('auth','verified','superadmin');


Route::view('membre','membre.membre')->middleware('verified', 'check','membre');


Route::get('document', 'DocController@index')->name('doc.index')->middleware('verified', 'check','membre');
Route::get('document/add', 'DocController@create')->name('doc.add')->middleware('verified', 'check','membre');
Route::post('document/add', 'DocController@store')->name('doc.store')->middleware('verified', 'check','membre');
Route::get('document/{document}/list', 'DocController@show')->name('doc.show')->middleware('verified', 'check','membre');
Route::get('document/file/test', 'FileController@index')->name('file.index')->middleware('verified', 'check','membre');
Route::get('document/{document}/file', 'FileController@create')->name('file.add')->middleware('verified', 'check','membre');
Route::post('document/file/store', 'FileController@store')->name('file.store')->middleware('verified', 'check','membre');


Route::get('budget', 'BudgetController@index')->name('budget.index')->middleware('verified', 'check','membre');
Route::get('budget/create', 'BudgetController@create')->name('budget.index')->middleware('verified', 'check','membre','tresorier');
Route::post('budget/create', 'BudgetController@store')->name('budget.store')->middleware('verified', 'check','membre','tresorier');
Route::get('budget/{budget}/edit', 'BudgetController@edit')->name('budget.edit')->middleware('verified', 'check','membre','tresorier');
Route::put('budget/{budget}', 'BudgetController@update')->name('budget.update')->middleware('verified', 'check','membre','tresorier');
Route::delete('budget/del/{budget}', 'BudgetController@destroy')->name('budget.destroy')->middleware('verified', 'check','membre');
Route::get('budget/{budget}', 'DepController@index')->name('depense.index')->middleware('verified', 'check','membre');
Route::get('budget/{budget}/depense','DepController@create')->name('depense.create')->middleware('verified', 'check','membre','tresorier');
Route::post('budget/{budget}/depense','DepController@store')->name('depense.store')->middleware('verified', 'check','membre','tresorier');
Route::get('budget/{budget}/gain','GainController@create')->name('gain.create')->middleware('verified', 'check','membre','tresorier');
Route::post('budget/{budget}/gain','GainController@store')->name('gain.store')->middleware('verified', 'check','membre','tresorier');
Route::get('budget/supprimer','BudgetController@supp')->middleware('verified', 'check','membre','tresorier');

Route::get('budget/depense/{depense}','DepController@show')->name('dep.show')->middleware('verified', 'check','membre','tresorier');
Route::get('budget/gain/{gain}','GainController@show')->name('gain.show')->middleware('verified', 'check','membre','tresorier');
Route::get('/downloadPDF/{id}','DepController@pdf');

Route::get('test', 'BudgetController@test');
