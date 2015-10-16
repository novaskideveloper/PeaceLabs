<?php

/**
 * Frontend Controllers.
 */

get('/new', 'FrontendController@index')->name('home');
get('macros', 'FrontendController@macros');
get('/', 'FrontendController@home');

Route::model('projects', 'Project');
/* uncomment this to use pretty URL
Route::bind('projects', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});
 */
Route::resource('projects', 'ProjectsController');


/*
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function () {
    get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
    get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
    patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');
});
