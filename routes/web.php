<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// GET
Route::get('/login', 'AuthController@index')->name('login')->middleware('guest');
Route::get('/register', 'AuthController@registerPage')->name('register');
Route::get('/document-chapters/{id}', 'DocumentChapterController@manageChapters')->name('document-chapters.manageChapters');
Route::get('/user/{id}/forgot-password', 'AuthController@showChangePasswordForm')->name('forgot-password');
Route::get('/document-chapters/{id}/add-chapter', 'DocumentChapterController@addChapter')->name('document-chapters.add-chapter');
Route::get('/document-chapters/{id}/note', 'DocumentChapterController@manageNote')->name('document-chapters.note');

// PUT
Route::put('/user/{id}/forgot-password', 'AuthController@updatePassword')->name('update-password');
Route::put('/document-chapters/{id}/note', 'DocumentChapterController@updateNote')->name('document-chapters.note');

// POST
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@authenticate');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::resource('payment-translator', 'PaymentTranslatorController');
Route::resource('account-translator', 'AccountTranslatorController');
Route::resource('document-chapters', 'DocumentChapterController');
Route::resource('documents', 'DocumentController');
Route::resource('users', 'UserController');
Route::resource('payments', 'PaymentController');
