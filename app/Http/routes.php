
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

Route::auth();

Route::group(['middleware' => ['auth']], function() {
	Route::get('/', 'WelcomeController@index');
	Route::get('/welcome', 'WelcomeController@index');

	Route::get('/categories', 'CategoryController@index');
	Route::get('/categories/{name}', 'CategoryController@findByName');

	Route::get('/contents/{content}', 'ContentController@index');

	Route::get('/media', 'MediaController@index');
	Route::get('/media/uploads', function() { return view('media.uploads'); });
	Route::get('/media/{media}/edit', 'MediaController@edit');
	Route::post('/media', 'MediaController@create');
	Route::put('/media/{media}', 'MediaController@update');
	Route::delete('/media/{media}', 'MediaController@delete');

	Route::get('/syllabus', 'SyllabusController@index');

	Route::get('/exams', 'ExamController@index');
});

Route::group(['middleware' => ['auth', 'instructor']], function() {
	Route::post('/exams/{exam}/nominees', 'ExamController@addNominee');
	Route::delete('/exams/{exam}/nominees/{userId}', 'ExamController@removeNominee');
});

Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::post('/categories/{category}/contents', 'CategoryController@addContent');

	Route::get('/contents/{content}/edit', 'ContentController@edit');
	Route::put('/contents/{content}', 'ContentController@update');
	Route::delete('/contents/{content}', 'ContentController@delete');

	Route::post('/contents/{content}/media', 'ContentController@addMedia');
	Route::delete('/contents/{content}/media/{mediaId}', 'ContentController@removeMedia');

	Route::get('/users', 'UserController@index');
	Route::get('/users/{user}', 'UserController@detail');
	Route::get('/users/{user}/edit', 'UserController@edit');
	Route::put('/users/{user}', 'UserController@update');
	Route::delete('/users/{user}', 'UserController@delete');

	Route::get('/groups', 'GroupController@index');
	Route::get('/groups/new', 'GroupController@createNew');
	Route::get('/groups/{name}', 'GroupController@findByName');
	Route::post('/groups', 'GroupController@create');
	Route::get('/groups/{group}/edit', 'GroupController@edit');
	Route::put('/groups/{group}', 'GroupController@update');
	Route::delete('/groups/{group}', 'GroupController@delete');

	Route::get('/syllabus/{program}/edit', 'SyllabusController@edit');
	Route::put('/syllabus/{program}', 'SyllabusController@update');
	Route::delete('/syllabus/{program}/entries/{entry}', 'SyllabusController@delete');

	Route::post('/exams', 'ExamController@create');
	Route::get('/exams/{exam}/edit', 'ExamController@edit');
	Route::put('/exams/{exam}', 'ExamController@update');
	Route::delete('/exams/{exam}', 'ExamController@delete');
});
