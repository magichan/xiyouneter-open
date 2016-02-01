<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['prefix'=>'test','namespace'=>'Test','middleware'=>['web','auth']],function(){
Route::get('/','TestController@index');
Route::get('/email','TestEmailController@index');
});

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::Auth();

    Route::get('/home', 'HomeController@index');
    /* Route::get('/user/info','UserController@index'); */
});

Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['web','auth']],function(){
  Route::get('/active','ActiveController@Active');
  Route::get('/active/{token?}','ActiveController@ActiveUser');
  Route::get('/info','UserController@index');
  Route::get('/info/edit','UserController@getEdit');
  Route::post('/info','UserController@postInfo');
});

