<?php

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/help', 'PagesController@help');

Auth::routes();

Route::get('/redirect-user', 'RedirectionsController@redirectUser');

Route::get('/mandatory', 'RemainingRegistrationController@create');
Route::post('/mandatory', 'RemainingRegistrationController@store');

Route::middleware('customer')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::resource('projects', 'ProjectsController');

    Route::get('/projects/owners/add', 'OwnersController@create');
    Route::post('/projects/owners', 'OwnersController@store');
});

Route::group([
    'prefix' => 'backend',
    'namespace' => 'Backend',
    'middleware' => 'backend'
], function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::resource('users', 'UsersController', ['except' => ['destroy']]);

    Route::get('/people', 'PeopleController@index');
    Route::get('/people/{person}', 'PeopleController@show');
    Route::get('/people/{person}/add-user', 'PeopleController@showAddUserForm');
    Route::post('/people/{person}', 'PeopleController@addUser');

    Route::get('/pending-accounts', 'PendingAccountsController@index');
    Route::get('/pending-accounts/{user}', 'PendingAccountsController@show');
    Route::patch('/pending-accounts/{user}', 'PendingAccountsController@activate');
});
