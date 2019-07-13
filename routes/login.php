<?php

Auth::routes();
Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login.form')->middleware('guest');
Route::post('/admin/login', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::post('/admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout')->middleware('admin');




