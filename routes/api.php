<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Tasks
Route::get('/v1/tasks', 'TaskController@index')->name('tasks.index');
Route::post('/v1/tasks', 'TaskController@store')->name('tasks.store');
Route::get('/v1/tasks/{task}', 'TaskController@show')->name('tasks.show');
Route::put('/v1/tasks/{task}', 'TaskController@update')->name('tasks.update');
Route::delete('/v1/tasks/{task}', 'TaskController@destory')->name('tasks.destroy');


//Report
Route::get('/v1/job', 'ReportController@getCountByOccupation')->name('report.getCountByOccupation');
Route::get('/v1/gender', 'ReportController@getGenderCount')->name('report.getGenderCount');
Route::get('/v1/annual', 'ReportController@getAnnualBreakdown')->name('report.getAnnualBreakdown');
Route::get('/v1/activity', 'ReportController@getLeadActivity')->name('report.getLeadActivity');

