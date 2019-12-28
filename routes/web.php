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
})->name('index');;

//Route::get('/about', 'PageController@about')->name('about');;
//Route::get('/contact', 'PageController@contact')->name('contact');
//Route::get('/create', 'QuestionController@store')->name('store');

Route::resource('questions', 'QuestionController');



//Route::get('questions/show?{$id}', function() {
//    return view('questions.show');
//})->name('blah');

//Route::get('/recent', function () {
//    return view('recent');
//})->name('recent');;