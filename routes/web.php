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

Auth::routes();


// Dashboard routes
Route::get('/', 'DashboardController@index')->name('dashboard.index');



// Project routes
Route::get('/project', 'ProjectController@index')->name('project.index');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::get('/project/{id}', 'ProjectController@show')->name('project.show');
Route::get('/autocomplete', 'ProjectController@autocomplete')->name('project.autocomplete');
Route::get('/search', 'ProjectController@search')->name('project.search');
Route::get('/project/{id}/edit', 'ProjectController@edit')->name('project.edit');

Route::post('/project', 'ProjectController@store')->name('project.store');
Route::patch('/project/{id}/update', 'ProjectController@update')->name('project.update');

Route::delete('/project/{id}', 'ProjectController@destroy');


// Lead routes
Route::get('/lead/create', 'LeadController@create')->name('lead.create');
Route::get('/lead', 'LeadController@index')->name('lead.index');
Route::get('/lead/{id}', 'LeadController@show')->name('lead.show');
Route::get('/lead/{id}/edit', 'LeadController@edit')->name('lead.edit');

Route::post('/lead', 'LeadController@store')->name('lead.store');



// Contact routes
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/contact/create', 'ContactController@create')->name('contact.create');
Route::get('/contact/{id}/edit', 'ContactController@edit')->name('contact.edit');

Route::post('/contact', 'ContactController@store')->name('contact.store');
Route::patch('/contact/{id}/update', 'ContactController@update')->name('contact.update');

Route::delete('/contact/{id}', 'ContactController@destroy')->name('contact.destroy');
