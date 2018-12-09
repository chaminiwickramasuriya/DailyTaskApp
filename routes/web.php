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
Route::get('/task', function () {
    return view('task');
});
Route::get('/task', function(){
    $data=App\TaskModel::all();
    return view('task')-> with('tasks',$data);
});
Route::post('/saveTask', 'TaskController@store');
Route::get('/markAsCompleted/{id}', 'TaskController@markAsCompleted');
Route::get('/markAsNotCompleted/{id}', 'TaskController@markAsNotCompleted');
Route::get('/deleteTask/{id}', 'TaskController@deleteTask');