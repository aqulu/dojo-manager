<?php

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

Route::get('/', 'CategoryController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{name}', 'CategoryController@findByName');
Route::post('/categories/{category}/contents', 'CategoryController@addContent');

Route::get('/contents/{content}', 'ContentController@index');
Route::get('/contents/{content}/edit', 'ContentController@edit');

Route::put('/contents/{content}', 'ContentController@update');
Route::delete('/contents/{content}', 'ContentController@delete');

Route::post('/contents/{content}/media', 'ContentController@addMedia');
Route::delete('/contents/{content}/media/{mediaId}', 'ContentController@removeMedia');

Route::get('/media', 'MediaController@index');
Route::post('/media', 'MediaController@create');
Route::post('/media/{media}', 'MediaController@delete');

Route::get('/members', 'GroupController@index');
Route::get('/members/{name}', 'GroupController@findByName');

Route::get('/examprograms', 'ExamProgramController@index');
