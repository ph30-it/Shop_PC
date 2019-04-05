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

Route::get('/', 'FrontendController@getHome');

Route::get('detail/{id}/{slug}.html','FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html','FrontendController@postComment');

Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

Route::get('search','FrontendController@getSearch');

Route::group(['prefix'=>'cart'],function(){
			Route::get('add/{id}','CartController@getAddCart');
			Route::get('show','CartController@getShowCart');
			Route::get('delete/{id}','CartController@getDeleteCart');
			Route::get('update','CartController@getUpdateCart');
			Route::post('show','CartController@postComplete');
		});
Route::get('complete','CartController@getComplete');

/*Route::get('dang-nhap','FrontendController@getLogin');
Route::post('dang-nhap','FrontendController@postLogin');

Route::get('dang-ki','FrontendController@getSignin');
Route::post('dang-ki','FrontendController@postSignin');

Route::get('dang-xuat','FrontendController@postLogout');*/
Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'FrontendController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'FrontendController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'FrontendController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'FrontendController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'FrontendController@postLogout'
]);

    


Route::group(['namesapce'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','Admin\LoginController@getLogin');
		Route::post('/','Admin\LoginController@postLogin');
	});
	Route::get('logout','Admin\HomeController@getLogout');
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
			Route::get('home','Admin\HomeController@getHome');
		
		Route::group(['prefix'=>'category'],function(){
			Route::get('/','Admin\CategoryController@getCate');
			Route::post('/','Admin\CategoryController@postCate');

			Route::get('edit/{id}','Admin\CategoryController@getEditCate');
			Route::post('edit/{id}','Admin\CategoryController@postEditCate');

			Route::get('delete/{id}','Admin\CategoryController@getDeleteCate');
		});

		Route::group(['prefix'=>'product'],function(){
			Route::get('/','Admin\ProductController@getProduct');

			Route::get('add','Admin\ProductController@getAddProduct');
			Route::post('add','Admin\ProductController@postAddProduct');

			Route::get('edit/{id}','Admin\ProductController@getEditProduct');
			Route::post('edit/{id}','Admin\ProductController@postEditProduct');

			Route::get('delete/{id}','Admin\ProductController@getDeleteProduct');
		});

		Route::group(['prefix'=>'user'],function(){
			Route::get('/','Admin\UserController@getUser');

			Route::get('add','Admin\UserController@getAddUser');
			Route::post('add','Admin\UserController@postAddUser');

			Route::get('edit/{id}','Admin\UserController@getEditUser');
			Route::post('edit/{id}','Admin\UserController@postEditUser');

			Route::get('delete/{id}','Admin\UserController@getDeleteUser');
		});
		});
});
