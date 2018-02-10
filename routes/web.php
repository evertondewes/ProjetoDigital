<?php

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/help', 'PagesController@help');

Auth::routes();

Route::get('/redirect', 'RedirectionsController@redirect');

Route::group(['middleware' => 'customer'], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group([
    'prefix' => 'backend',
    'middleware' => 'backend',
    'namespace' => 'Backend',
], function () {
    Route::resource('users', 'UsersController');

    Route::get('/dashboard', 'DashboardController@index');
});
