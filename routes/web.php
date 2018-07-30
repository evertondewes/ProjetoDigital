<?php

Route::get('/teste', 'TesteController@index');
Route::post('/teste', 'TesteController@store');

Route::middleware('guest')->group(function () {
    Route::get('/', 'PagesController@index');
    Route::get('/about', 'PagesController@about');
    Route::get('/help', 'PagesController@help');

});

Auth::routes();

Route::get('/redirect-user', 'RedirectionsController@redirectUser');

Route::middleware('not-full-registered')->group(function () {
    Route::get('/mandatory', 'RemainingRegistrationController@create');
    Route::post('/mandatory', 'RemainingRegistrationController@store');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', 'SettingsController@show');
    Route::get('/settings/email', 'SettingsController@editEmail');
    Route::patch('/settings/email', 'SettingsController@updateEmail');
    Route::get('/settings/username', 'SettingsController@editUsername');
    Route::patch('/settings/username', 'SettingsController@updateUsername');
    Route::get('/settings/password', 'SettingsController@editPassword');
    Route::patch('/settings/password', 'SettingsController@updatePassword');
    Route::get('/settings/address', 'SettingsController@editAddress');
    Route::patch('/settings/address', 'SettingsController@updateAddress');
    Route::get('/settings/phone-numbers', 'SettingsController@showPhoneNumbers');
    Route::post('/settings/phone-numbers', 'SettingsController@storePhoneNumber');
    Route::delete('/settings/{phoneNumber}/phone-numbers', 'SettingsController@destroyPhoneNumber');
    Route::delete('/settings', 'SettingsController@destroy');

    Route::get('/project-docs-view/{id}/{projectDocument}', 'ProjectDocumentsController@view');
    Route::get('/project-docs-approve/{project}', 'ProjectDocumentsController@analyze');
    Route::post('/project-docs-approve/{project}', 'ProjectDocumentsController@approve');
    Route::get('/project-docs/{projectDocument}', 'ProjectDocumentsController@download');
    Route::post('/project-docs/{project_type}/{project}', 'ProjectDocumentsController@store');
    Route::delete('/project-docs/{projectDocument}', 'ProjectDocumentsController@destroy');

    Route::get('/event-docs/{eventDocument}', 'Backend\EventDocumentsController@download');
});

Route::middleware('customer')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::resource('projects', 'ProjectsController');

    Route::get('/owners/add/{project?}', 'OwnersController@create');
    Route::post('/owners/{project?}', 'OwnersController@store');

    Route::get('/projects/{project}/docs', 'ProjectDocumentsController@index');
    Route::post('/projects/{project}/docs', 'ProjectDocumentsController@store');

    Route::get('/projects/{project}/historic', 'EventsController@index');
    Route::get('/events/{event}', 'EventsController@show');
});

Route::group([
    'prefix' => 'backend',
    'namespace' => 'Backend',
    'middleware' => 'backend'
], function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::resource('users', 'UsersController', ['except' => ['destroy', 'edit', 'update']]);
    Route::patch('/users/{user}', 'UsersController@activate');
    Route::delete('/users/{user}', 'UsersController@deactivate');

    Route::get('/people', 'PeopleController@index');
    Route::get('/people/{person}', 'PeopleController@show');
    Route::get('/people/{person}/add-user', 'PeopleController@showAddUserForm');
    Route::post('/people/{person}', 'PeopleController@addUser');

    Route::get('/pending-accounts', 'PendingAccountsController@index');
    Route::get('/pending-accounts/{user}', 'PendingAccountsController@show');
    Route::patch('/pending-accounts/{user}', 'PendingAccountsController@activate');

    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/{project}', 'ProjectsController@show');

    Route::get('/projects/{project}/events', 'EventsController@index');
    Route::get('/projects/{project}/events/create', 'EventsController@create');
    Route::post('/projects/{project}/events', 'EventsController@store');
    Route::get('/events/{event}', 'EventsController@show');

    Route::post('/events/{event}/docs', 'EventDocumentsController@store');
    Route::delete('/event-docs/{eventDocument}', 'EventDocumentsController@destroy');
});
