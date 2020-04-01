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


Route::get(
    '/basic-test',
    function () {
        return view('result');
    }
);


Route::get('tests', 'usersController@index');


Route::post('/start', 'testController@start')->name('create.test');


Route::get('/start', 'testController@index')->name('test');
Route::get('/basic-test/{id}', 'testController@getQuestion')->name('question');


Route::post('/basic-test', 'ResultController@saveAnswer')->name('save.answer');
Route::get('/basic-test', 'ResultController@getResult');
Route::post('/basic-test/result', 'ResultController@saveResult')->name('save.result');
Route::get('/basic-test/result/table/{id}', 'ResultController@showAnswers')->name('save.result');


