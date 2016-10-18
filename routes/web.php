<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  $user->notify();
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/task/{task}/edit', 'TaskController@edit');
Route::patch('/task/{task}', 'TaskController@update');

//emails
Route::patch('/email/send/{task}', 'MailController@send_mail');
Route::get('/{task}/to', 'MailController@select_receiver');
