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
Route::get('/lang/{lang}', 'LanguageController@index');

Route::get('/template', function(){
    return view('template.index');
});

Route::get('/template/full-page', function(){
    return view('template.full-page');
});

Route::get('/template/list', function(){
    return view('template.list');
});

Route::get('/template/form', function(){
    return view('template.form');
});

Route::get('/template/button', function(){
    return view('template.button');
});

Route::get('/template/text', function(){
    return view('template.text');
});

Route::get('/template/ajax', function(){
    return view('template.ajax');
});

Route::get('/template/confirm', function(){
    return view('template.confirm');
});

Route::get('/template/icon', function(){
    return view('template.icon');
});
Route::get('/template/model', function(){
    return view('template.model');
});
Route::get('/template/popupmessage', function(){
    return view('template.popup-message');
});

Auth::routes();

Route::get('/home', 'HomeController@index');