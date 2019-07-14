<?php

/**
 * Main page
 */
Route::get('/', 'IndexController@index')->name('index');

/**
 * Feedback form
 */
Route::post('/feedback', 'FeedbackController@feedback')->name('feedback');
