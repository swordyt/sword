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
Route::get('flush',function(){
	return view('flush.view');
});
Route::post('flush',function(Request $request){
	$addr = "http://r.chinacache.com/content/refresh";
	$name= $request->input('name');
	$password= $request->input('password');
		$urls=explode(',',$request->input('urls'));
		$dirs = explode(',',$request->input('dirs'));
		$callback = array('url'=>$request->input('url'),'email'=>$request->input('email'),'acptNotice'=>$request->input('acptNotice'));
	$task = json_encode(array('urls'=>$urls,'dirs'=>$dirs,'callback'=>$callback));
	$post_data = json_encode(array('username'=>$name,'password'=>$password,'task'=>$task));
	
	    $ch = curl_init();  
        curl_setopt($ch, CURLOPT_POST, 1);  
        curl_setopt($ch, CURLOPT_URL, $addr);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
            'Content-Type: application/json; charset=utf-8',  
            'Content-Length: ' . strlen($post_data))  
        );  
        ob_start();  
        curl_exec($ch);  
        $return_content = ob_get_contents();  
        ob_end_clean();  
  
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
		$errors = array('statcode'=>$return_code,'msg'=>$return_content);
        return view('flush.view')->withErrors($errors);
	
	
	});
Route::get('home','HomeController@index');
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



