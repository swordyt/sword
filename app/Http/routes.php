<?php
use Illuminate\Http\Request; 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Route::get('/', 'WelcomeController@index');
Route::group(['prefix'=>'flush','namespace'=>'flush'],function(){
	Route::get('/',function(){
		return view('flush.viewcc');
	});
	Route::get('cloud',function(){
		return view('flush.viewcloud');
	});
	Route::resource('cc','ChinacacheController');
	Route::post('cloud','CloudController@store');
});


Route::get('/','HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('pages/{id}','PagesController@show');
Route::post('comment/page','CommentsController@page');
Route::post('comment/article','CommentsController@article');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'adminAuth'],function(){
#Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){
		Route::get('/','AdminHomeController@index');
		Route::resource('pages','PagesController');
		Route::resource('comments','CommentsController');
		Route::resource('articles','ArticlesController');
});
Route::get('articles','ArticlesController@index');
Route::get('articles/{id}','ArticlesController@show');

Route::group(['prefix'=>'user','namespace'=>'user','middleware'=>'auth'],function(){
	Route::resource('articles','ArticlesController');
});
/***********************************************************************************/
Route::get('session',function(){
	dd( cookie('name','value',3600));
});


