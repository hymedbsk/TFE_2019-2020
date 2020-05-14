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

Route::get('/index', function () {
    return view('accueil');
});


Route::post('/', 'ContactController@postForm')->name('contact.form');
Route::view('/plateforme', 'plateforme');
Route::get('/profil', 'ChangerPasswordController@index')->middleware('verified');
Route::post('/profil', 'ChangerPasswordController@store')->name('change.password')->middleware('verified');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::resource('post', 'PostController');
Route::resource('user', 'UserController');

Auth::routes(['verify'=> true]);


Route::get('/download/{file}', function ($file='') {
    return response()->download('app/public/'.$file);
})->middleware('verified');

Route::post('post/search', 'PostController@search')->name('post.search');
Route::put('user/{id}', 'UserController@admin')->name('user.admin')->middleware('auth','admin','verified','president','vicepresident');
Route::put('user/{user}', 'UserController@delAdmin')->name('user.delAdmin')->middleware('auth','admin','verified','president','vicepresident');
Route::get('verification', 'UserController@getCheck')->middleware('auth','admin','verified','president','vicepresident');
Route::put('verification/{user}', 'UserController@check')->name('user.check')->middleware('auth','admin','verified','president','vicepresident');

Route::get('role', 'RoleController@index' )->name('role.index')->middleware('auth','verified');
Route::get('role/gestion', 'RoleController@show' )->name('role.show')->middleware('auth','verified');
Route::get('role/gestion/create', 'RoleController@create' )->name('role.create')->middleware('auth','verified');
Route::post('role/gestion/create', 'RoleController@store' )->name('role.store')->middleware('auth','verified');
Route::put('role/{role}/add', 'RoleController@change')->name('role.change');
Route::delete('role/gestion/{role}', 'RoleController@destroy')->name('role.destroy')->middleware('auth','verified');
Route::delete('role/{role}', 'RoleController@delete')->name('role.delete')->middleware('auth','verified');
Route::get('/', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('test', 'FileController@index');
Route::get('/ViewerJS/{all?}', array('as' => 'pdfViewer', 'uses' => 'ViewFileController@pdfViewer'));

Route::view('document', 'sharepoint');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('post/test', 'PostController@show')->name('file.show');

Route::get('document', 'DocController@index')->name('doc.index');
Route::get('document/add', 'DocController@create')->name('doc.add');
Route::post('document/add', 'DocController@store')->name('doc.store');

Route::get('document/{document}/list', 'DocController@show')->name('doc.show');


Route::get('document/file/test', 'FileController@index')->name('file.index');
Route::get('document/{document}/file', 'FileController@create')->name('file.add');
Route::post('document/file/store', 'FileController@store')->name('file.store');

Route::view('test','file.test');

Route::get('budget', 'BudgetController@index')->name('budget.index');
Route::get('budget/create', 'BudgetController@create')->name('budget.index');
Route::post('budget/create', 'BudgetController@store')->name('budget.store');
Route::get('budget/{budget}/edit', 'BudgetController@edit')->name('budget.edit');
Route::put('budget/{budget}', 'BudgetController@update')->name('budget.update');
Route::delete('budget/{budget}', 'BudgetController@destroy')->name('budget.destroy');

Route::get('budget/{budget}', 'DepController@index')->name('depense.index');
Route::get('budget/{budget}/depense','DepController@create')->name('depense.create');
Route::post('budget/{budget}/depense','DepController@store')->name('depense.store');

Route::get('budget/{budget}/gain','GainController@create')->name('gain.create');
Route::post('budget/{budget}/gain','GainController@store')->name('gain.store');

Route::get('/downloadPDF/{id}','DepController@pdf');
