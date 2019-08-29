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
Route::get('/task/{{$task->id}}/view', 'TasksController@viewmore');
Route::get('/task/{id}/edittask', 'TasksController@edittask');
Route::post('/task/{id}/saveeditedtask', 'TasksController@saveeditedtask');
Route::get('/task/{id}/delete', 'TasksController@destroy');
