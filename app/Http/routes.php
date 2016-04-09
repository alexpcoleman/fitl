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

Route::get('/', 'QuestionController@index');

Route::get('home', function() {
	return redirect('/');
});

// Route::get('welcome', function () {
//     return view('welcome');
// });

Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

Route::delete('questions/{question}', 'QuestionController@destroy');
Route::get('questions/{question}/edit', 'QuestionController@edit');
Route::put('questions/{question}', 'QuestionController@update');
Route::post('questions/store', 'QuestionController@store');
Route::get('questions/create', 'QuestionController@create');
Route::get('questions/search', 'QuestionController@search');
Route::get('questions/{question}', 'QuestionController@show');
Route::get('questions', 'QuestionController@index');

Route::resource('questions.comments', 'QuestionCommentController',
								['only' => ['store', 'update', 'destroy']]);

Route::resource('languages', 'LanguageController');

// User routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



								