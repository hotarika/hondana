<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Auth::id() ? redirect('bookshelf') : view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/bookshelf', 'BookshelfController');
    Route::get('/books-graph', 'BooksGraphController')->name('books-graph');

    // パスワード変更
    Route::get('/password/change', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
    Route::post('/password/change', 'Auth\ChangePasswordController@changePassword')->name('password.change');

    // 会員情報変更
    Route::get('/edit/profile', 'Auth\EditProfileController@showEditProfileForm')->name('edit.form');
    Route::post('/edit/profile', 'Auth\EditProfileController@editProfile')->name('edit.profile');

    // 退会
    Route::delete('/withdraw', 'Auth\WithdrawController')->name('withdraw');
});

// Async
Route::get('/async/bookshelf', 'AsynchronousController@getBookshelf');
Route::get('/async/booksnum', 'AsynchronousController@getBooksNum');
