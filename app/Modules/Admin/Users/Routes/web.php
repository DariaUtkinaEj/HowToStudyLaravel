<?php

Route::group(['prefix' => 'users', 'middleware' => []], function () {
    Route::get('/', 'UsersController@index')->name('users.index');
    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::post('/', 'UsersController@store')->name('users.store');
    Route::get('/{user}', 'UsersController@show')->name('users.read');
    Route::get('/edit/{user}', 'UsersController@edit')->name('users.edit');
    Route::put('/{user}', 'UsersController@update')->name('users.update');
    Route::delete('/{user}', 'UsersController@destroy')->name('users.delete');
});