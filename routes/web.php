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
Route::get('{id}/selfDetailQ', 'HomeController@selfDetailQuestion')->name('selfDetailQuestion');
Route::get('{id}/selfDetailA', 'HomeController@selfDetailAnswer')->name('selfDetailAnswer');
Route::get('sort','HomeController@sort')->name('sort');
Route::post('addAnswer','HomeController@addAnswer')->name('addAnswer');
Route::get('{id}/edit_question', 'HomeController@edit_question')->name('edit_question');
Route::get('{id}/edit_answer', 'HomeController@edit_answer')->name('edit_answer');
Route::put('update_question','HomeController@update_question')->name('update_question');
Route::put('update_answer','HomeController@update_answer')->name('update_answer');
Route::get('{id}/delete_question', 'HomeController@delete_question')->name('delete_question');
Route::get('{id}/delete_answer', 'HomeController@delete_answer')->name('delete_answer');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
