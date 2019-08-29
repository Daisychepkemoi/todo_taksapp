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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createtask', 'TasksController@index')->name('createtask');
Route::post('/savetask', 'TasksController@store')->name('savetask');
Route::get('/viewtasks', 'TasksController@show');
Route::get('/task/{id}/edittask', 'TasksController@edittask');
Route::post('/task/{id}/saveeditedtask', 'TasksController@saveeditedtask');
Route::get('/task/{id}/delete', 'TasksController@destroy');
Route::get('/task/completed', 'TasksController@complete');
Route::get('/task/incomplete', 'TasksController@incomplete');
Route::get('/task/markcomplete/{id}', 'TasksController@markcomplete');//for incomplete tasks
Route::get('/task/markincomplete/{id}', 'TasksController@markincomplete');//for complete tasks

Route::get('/task/{id}/viewdetails', 'subtasksController@index');
Route::post('/savetask/{id}/subtask', 'subtasksController@store');
Route::get('/subtask/{id}/saveeditedsubtask', 'subtasksController@editsubtask');
Route::post('/subtask/{id}/saveeditedsubtaskk', 'subtasksController@saveeditedtask');
Route::get('/subtask/{id}/delete', 'subtasksController@destroy');
Route::get('/subtask/markcomplete/{id}', 'SubtasksController@markcomplete');//for incomplete tasks
Route::get('/subtask/markincomplete/{id}', 'SubtasksController@markincomplete');//for complete tasks