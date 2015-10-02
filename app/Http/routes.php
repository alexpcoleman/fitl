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

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome', function () {
    return view('welcome');
});

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

								