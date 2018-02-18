<?php

Route::namespace('Api')->group(function () {
    Route::get('/states', 'StatesController@index');
    Route::get('/states/{state}/cities', 'StatesController@showCities');
});
