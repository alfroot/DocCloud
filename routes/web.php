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
Route::delete('documents/file/{document}/delete', 'DocumentsController@destroyFile')->name('destroyfile');
Route::post('documents/{document}/documents', 'DocumentsController@storedoc')->name('documentsavepublic');

route::get('/doccloud', 'PagesController@doccloud')->name('doccloud.pages');
route::get('/documents', 'PagesController@documents')->name('documents.pages');
Route::get('documents/download/{document}' , 'DocumentsController@downloadFile')->name('downloadFile');
Route::get('documents/show/{document}' , 'DocumentsController@show')->name('showFile');
route::get('/categories', 'PagesController@categories')->name('categories.pages');

Route::resource('users', 'UsersController');


Route::get('/category', 'CategoriesController@index')->name('user.category.index');
Route::get('/category/propose', 'CategoriesController@propose')->name('user.category.propose');
Route::post('/category/store', 'CategoriesController@store')->name('user.category.store');
Route::post('/category/getcats','CategoriesController@getCategory')->name('getcatspub');

//Paypal
Route::get('/paypalstatus/{document}', 'PayPalController@getPaymentStatus')->name('payment.status');
Route::get('/shop/paypal/{document}', 'PayPalController@postPayment')->name('paypalproduct');
Route::get('/subscribe/paypal', 'PayPalController@paypalRedirect')->name('paypal.redirect');
Route::get('/subscribe/paypal/return', 'PayPalController@paypalReturn')->name('paypal.return');

//DocCLoud
Route::get('/doc/', 'DocCloudController@index')->name('doc.in');
Route::get('/show/document/{document}','DocCloudController@show')->name('showdoc');

//Searcher
Route::get('/search/index', 'SearchController@index')->name('indexsearch');
Route::post('/search/users','SearchController@getUsers')->name('getusers');
