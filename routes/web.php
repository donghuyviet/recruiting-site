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

Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('/template', function(){
        return view('template.index');
    });

    Route::get('/components', function(){
        return view('template.component');
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
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/orderer', 'OrdererController@index');
Route::get('/orderer/entry', 'OrdererController@create');
Route::get('/orderer/detail/{id}', 'OrdererController@view_detail');
Route::post('/orderer/store', 'OrdererController@store');

Route::get('/seeker/entry', 'SeekerController@entry');
Route::post('/seeker/store', 'SeekerController@store');

Route::get('/seeker/edit/{id}','SeekerController@edit');
Route::post('/seeker/edit/{id}','SeekerController@update');

Route::get('/search','SearchController@index');
Route::get('/search/fillter','SearchController@fillter');
Route::get('/search/location','SearchController@location');
Route::get('/search/rosen','SearchController@rosen');
Route::get('/search/rosen/{id}','SearchController@station');
Route::get('/search/rosen-east','SearchController@east');
Route::get('/search/condition','SearchController@condition');
Route::get('/search/career','SearchController@career');
Route::get('/search/zenkoku','SearchController@zenkoku');

Route::get('/jobs/entry', 'JobsController@index');
Route::post('/jobs/entry', 'JobsController@save');
Route::get('/jobs', 'JobsController@listjobs');
Route::get('/jobDetails/{id}', 'JobsController@viewjob');
Route::get('/jobAuthor/{id}', 'JobsController@view_author_job');

Route::get('/api/keyword','ApiSearchController@index');
Route::get('/api/search','ApiSearchController@get_job_in_keyrord');
/*Route::get('/api/location','ApiSearchController@get_job_location');
Route::get('/api/specialization','ApiSearchController@get_job_specializations');
Route::get('/api/benefit','ApiSearchController@get_job_benefit');
Route::get('/api/salary','ApiSearchController@get_job_salary');*/
Route::get('/api/all/location','ApiSearchController@get_all_locations');
Route::get('/api/all/category','ApiSearchController@get_all_category');
Route::get('/api/all/benefit','ApiSearchController@get_all_benefit');
Route::get('/api/all/salary','ApiSearchController@get_all_salary_unit');
Route::get('/api/all/time','ApiSearchTrainController@get_all_time');
Route::get('/api/all/group_benefit','ApiSearchTrainController@get_all_group_benefit');
Route::get('/api/all','ApiSearchController@search_all');

Route::get('/api/rosen','ApiSearchTrainController@index');
Route::get('/api/station','ApiSearchTrainController@get_station');
Route::get('/api/get_station','ApiSearchTrainController@get_station_location');
Route::get('/api/lits/jobStation','ApiSearchTrainController@get_job_station');
Route::get('/api/train/listjobs','ApiSearchTrainController@get_job_train');
Route::get('/api/district','ApiSearchTrainController@get_district');
Route::get('/api/reaSearch','ApiSearchTrainController@get_jobs_areaSearch');
Route::get('/api/conditionSearch','ApiSearchTrainController@get_condition_search');
Route::get('/api/getLocationbyCity','ApiSearchTrainController@get_location_by_city');