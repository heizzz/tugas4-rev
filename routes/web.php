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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('listQuestion', 'HomeController@listQuestion')->name('listQuestion');
Route::get('selfQuestion', 'HomeController@selfQuestion')->name('selfQuestion');
Route::get('selfAnswer', 'HomeController@selfAnswer')->name('selfAnswer');
Route::post('addQuestion','HomeController@addQuestion')->name('addQuestion');
Route::get('{id}/detail','HomeController@detailQuestion')->name('detailQuestion');
Route::get('{id}/selfDetail', 'HomeController@selfDetailQuestion')->name('selfDetailQuestion');
Route::get('sort','HomeController@sort')->name('sort');
Route::post('addAnswer','HomeController@addAnswer')->name('addAnswer');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
