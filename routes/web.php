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
    return view('documents/index', compact('documents'));
});

Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('payment', 'PaymentsController');

Route::group([
    'prefix'    =>  'admin',
    'namespace' =>  'Admin',
    'middleware' => 'auth'],
    function () {

        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::resource('category', 'CategoriesController', ['as' => 'admin']);
        Route::resource('users', 'UsersController',['except' => 'show', 'as' => 'admin']);
        Route::resource('documents', 'DocumentsController',['except' => 'show', 'as' => 'admin']);
        Route::resource('payment', 'PaymentsController', ['as' => 'admin']);
        Route::post('documents/{document}/documents', 'DocumentsController@storedoc')->name('documentsave');
    });