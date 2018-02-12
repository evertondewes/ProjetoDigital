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
});

Route::group([
    'prefix' => 'backend',
    'namespace' => 'Backend',
    'middleware' => 'backend'
], function () {
    Route::resource('users', 'UsersController');

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/pending-accounts', 'PendingAccountsController@index');
    Route::get('/pending-accounts/{user}', 'PendingAccountsController@show');
    Route::post('/pending-accounts/{user}', 'PendingAccountsController@activate');
});
