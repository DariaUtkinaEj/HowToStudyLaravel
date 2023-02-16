<?php

Route::group(['prefix' => 'users', 'middleware' => []], function () {
    Route::get('/', 'Api\UsersController@index')->name('api.users.index');
    Route::post('/', 'Api\UsersController@store')->name('api.users.store');
    Route::get('/{user}', 'Api\UsersController@show')->name('api.users.read');
    Route::put('/{user}', 'Api\UsersController@update')->name('api.users.update');
    Route::delete('/{user}', 'Api\UsersController@destroy')->name('api.users.delete');
});