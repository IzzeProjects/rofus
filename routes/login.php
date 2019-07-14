<?php

/**
 * Admin routes
 */
Route::prefix('admin')
    ->name('admin.')
    ->namespace('Admin\Auth')
    ->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login.form')->middleware('guest');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout')->middleware('admin');
    });

/**
 * Admin routes
 */
Route::namespace('Client\Auth')->group(function () {
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::post('register', 'RegisterController@register')->name('register');
});

