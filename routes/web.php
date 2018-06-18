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

    return view('intro/home');
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
        Route::post('/payment/search/', 'PaymentsController@searchPays')->name('paysearch');
        Route::post('documents/{document}/documents', 'DocumentsController@storedoc')->name('documentsave');
        //charts
        Route::get('/charts/pays', 'ChartsController@chartpays')->name('chartpay');
        Route::get('/charts/doccat', 'ChartsController@chartDocCat')->name('charcat');
        Route::get('/charts/users', 'ChartsController@chartUsers')->name('charusr');
        Route::get('/charts/totals', 'ChartsController@totals')->name('totals');

        //Messages
        Route::get('/messages/index', 'MessagesController@index')->name('support');
        Route::get('/messages/out', 'MessagesController@out')->name('outmsg');
        Route::get('/messages/new', 'MessagesController@create')->name('createmsg');
        Route::get('/messages/read/{message}/{from}', 'MessagesController@read')->name('readmsg');
        Route::get('/charts/', 'ChartsController@index')->name('chartindex');

        Route::Post('/messages/post/', 'MessagesController@store')->name('newmsg');
        Route::post('/messages/readed', 'MessagesController@readed')->name('readed');


    });


//Public
Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home/profile', 'HomeController@settings')->name('settings');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/cat/{idcat}', 'HomeController@filterCat')->name('filterCat');
Route::get('/home/tag/{idtag}', 'HomeController@filterTag')->name('filterTag');
Route::get('/home/user/{iduser}', 'HomeController@filterUser')->name('filterUser');
Route::get('/home/ext/{idext}', 'HomeController@filterExt')->name('filterExt');


Route::post('/home/{like}/like','HomeController@like')->name('like');
//Route::resource('payment', 'PaymentsController');

Route::get('/documents/index', 'DocumentsController@index')->name('docindex');
Route::resource('documents', 'DocumentsController');
Route::delete('documents/file/{document}/delete', 'DocumentsController@destroyFile')->name('destroyfile');
Route::post('documents/{document}/documents', 'DocumentsController@storedoc')->name('documentsavepublic');
//intro
route::get('/doccloud', 'PagesController@intro')->name('doccloud.pages');
//download
Route::get('documents/download/{document}' , 'DocumentsController@downloadFile')->name('downloadFile');
//mostrar documento
Route::get('documents/show/{document}' , 'DocumentsController@show')->name('showFile');


Route::resource('users', 'UsersController');


Route::get('/category', 'CategoriesController@index')->name('user.category.index');
Route::get('/category/propose', 'CategoriesController@propose')->name('user.category.propose');
Route::post('/category/store', 'CategoriesController@store')->name('user.category.store');
Route::post('/category/getcats','CategoriesController@getCategory')->name('getcatspub');

//Paypal
Route::get('/paypalstatus/{document}', 'PayPalController@getPaymentStatus')->name('payment.status');
Route::get('/paypalstatus2/{category}/{total}', 'PayPalController@getPaymentStatus2')->name('payment.status2');
Route::get('/shop/paypal/{document}', 'PayPalController@postPaymentDoc')->name('paypalproduct');
Route::get('/shop/paypal/{category}/{total}/', 'PayPalController@postPaymentCat')->name('paypalcat');
Route::get('/subscribe/paypal', 'PayPalController@paypalRedirect')->name('paypal.redirect');
Route::get('/subscribe/paypal/return', 'PayPalController@paypalReturn')->name('paypal.return');

//DocCLoud
Route::get('/tree/{idcat}', 'DocCloudController@tree')->name('treepub');
Route::get('/show/document/{docu}/{category}/{salecategory}','DocCloudController@showOrPay')->name('showdoc');

//Searcher
Route::get('/search/index', 'SearchController@index')->name('indexsearch');
Route::post('/search/users','SearchController@getUsers')->name('getusers');
Route::post('/search/documents','SearchController@getDocuments')->name('getdocuments');
Route::post('/search/categories','SearchController@getCategories')->name('getcategories');

//Profile Photo
Route::post('settings/{user}/photo', 'UsersController@storeProfileUser')->name('profilephoto');

//Public messages
Route::get('/messages/index', 'MessagesController@index')->name('supportpublic');
Route::get('/messages/out', 'MessagesController@out')->name('outmsgpublic');
Route::get('/messages/new', 'MessagesController@create')->name('createmsgpublic');
Route::get('/messages/read/{message}/{from}', 'MessagesController@read')->name('readmsgpublic');


Route::Post('/messages/post/', 'MessagesController@store')->name('newmsgpublic');
Route::post('/messages/readed', 'MessagesController@readed')->name('readedpublic');

//Navbar infor
Route::get('/header/info', 'DocCloudController@getinfoheader')->name('getinfoheader');
Route::get('/header/info/message', 'MessagesController@getNews')->name('getNews');

//Money
Route::get('/money/index', 'MoneyController@index')->name('moneyindex');
Route::get('/money/totals', 'MoneyController@totals')->name('totalsmoney');
Route::get('/money/total', 'MoneyController@totalrevenue')->name('totalslife');
