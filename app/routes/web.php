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
    return view('welcome');
});

use App\Http\Middleware\HelloMiddleware;

//CodeCreate課題1〜3用ルーティング
Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@back');
Route::get('contact/check', 'ContactController@backToIndex');
Route::post('contact/check', 'ContactController@check');
Route::get('contact/finish', 'ContactController@backToIndex');
Route::post('contact/finish', 'ContactController@done');


//CodeCreate最終課題用ルーティング
Route::get('ecshop', 'EcShopController@index');

Route::get('ecshop/login', 'EcShopController@getLogin');
Route::post('ecshop/login', 'EcShopController@postLogin');

Route::get('ecshop/logout', 'EcShopController@logout');

Route::get('ecshop/register', 'EcShopController@getRegister');
Route::post('ecshop/register-finish', 'EcShopController@postRegisterDone');

Route::get('ecshop/cart', 'EcShopController@cartShow');
Route::post('ecshop/cart', 'EcShopController@cartAdd');

Route::get('ecshop/purchaseComplete', 'EcShopController@purchaseComplete');




//参考書Laravel入門用ルーティング
Route::get('hello', 'HelloController@index')->middleware('auth');
Route::post('hello', 'HelloController@post');

Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');

Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

Route::get('hello/show', 'HelloController@show');

Route::get('hello/auth', 'HelloController@getAuth');
Route::post('hello/auth', 'HelloController@postAuth');

Route::get('person', 'PersonController@index');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');
Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

Route::get('board', 'BoardController@index');
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController');

Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
