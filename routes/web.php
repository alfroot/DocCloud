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
    $documents = \App\Document::all();
    return view('pages/home', compact('documents'));
});


//Admin

Route::group([
    'prefix'    =>  'admin',
    'namespace' =>  'Admin',
    'middleware' => 'auth'],
    function () {

        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('category/tree', 'CategoriesController@showTree')->name('tree');
        Route::post('category/getcatsper','CategoriesController@getCategoriesPersistence')->name('getcatsper');
        Route::post('category/getcats','CategoriesController@getCategory')->name('getcats');

        Route::resource('category', 'CategoriesController', ['as' => 'admin']);
        Route::resource('users', 'UsersController',['except' => 'show', 'as' => 'admin']);
        Route::resource('documents', 'DocumentsController',[ 'as' => 'admin']);
        Route::resource('payment', 'PaymentsController', ['as' => 'admin']);
        Route::post('documents/{document}/documents', 'DocumentsController@storedoc')->name('documentsave');

    });


//Public
Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/{like}/like','HomeController@like')->name('like');
Route::resource('payment', 'PaymentsController');

Route::get('/documents/index', 'DocumentsController@index')->name('docindex');
Route::resource('documents', 'DocumentsController');
route::get('/doccloud', 'PagesController@doccloud')->name('doccloud.pages');
//route::get('/documents', 'PagesController@documents')->name('documents.pages');
route::get('/categories', 'PagesController@categories')->name('categories.pages');

Route::resource('users', 'UsersController');


Route::get('/category', 'CategoriesController@index')->name('user.category.index');
Route::get('/category/propose', 'CategoriesController@propose')->name('user.category.propose');
Route::post('/category/store', 'CategoriesController@store')->name('user.category.store');