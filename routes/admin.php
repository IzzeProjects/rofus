<?php

Route::get('/', 'IndexController@index')->name('index');

/**
 * News
 */
Route::resource('news', 'News\NewsController')->except('show');
Route::prefix('news')->name('news.')->group(function () {
    // News categories
    Route::resource('categories', 'News\CategoryController')->except('show');
});

/**
 * Members
 */
Route::resource('members', 'Member\MemberController')->except('show');
Route::prefix('members')->name('members.')->group(function () {
    Route::post('/image/iterator', 'Member\MemberController@imageIterator')->name('image.iterator');
});

/**
 * Feedback
 */
Route::resource('feedback', 'Feedback\FeedbackController')->only(['index', 'destroy']);

