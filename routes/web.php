<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/hello', function () {
    return 'hello ! ';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', 'App\Http\Controllers\PostController@index')->name('post');
Route::get('/userlist','App\Http\Controllers\PostController@userlist')->name('userlist');
Route::post('/testRequest','App\Http\Controllers\PostController@testRequest')->name('testRequest');


// Route::post('/post', 'PostController@createPost');

Route::resource('record', 'App\Http\Controllers\RecordController');


