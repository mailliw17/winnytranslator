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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'AuthController@index')->name('login');
    Route::get('/login', 'AuthController@index')->name('login');
    Route::post('/login', 'AuthController@authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    // RESOURCE
    Route::resource('withdraw', 'WithdrawController');
    Route::resource('withdraw-translator', 'WithdrawTranslatorController');
    Route::resource('task-chapters-translator', 'TaskChapterTranslatorController');
    Route::resource('payment-translator', 'PaymentTranslatorController');
    Route::resource('account-translator', 'AccountTranslatorController');
    Route::resource('document-chapters', 'DocumentChapterController');
    Route::resource('document-chapters-translator', 'DocumentChapterTranslatorController');
    Route::resource('documents', 'DocumentController');
    Route::resource('documents-download', 'DocumentDownloadController');
    Route::resource('documents-translator', 'DocumentTranslatorController');
    Route::resource('users', 'UserController');
    Route::resource('payments', 'PaymentController');

    // GET
    Route::get('/register', 'AuthController@registerPage')->name('register');
    Route::get('/document-chapters/{id}', 'DocumentChapterController@manageChapters')->name('document-chapters.manageChapters');
    Route::get('/document-chapters-translator/{id}', 'DocumentChapterTranslatorController@manageChapters')->name('document-chapters-translator.manageChapters');
    Route::get('/user/{id}/forgot-password', 'AuthController@showChangePasswordForm')->name('forgot-password');
    Route::get('/document-chapters/{id}/add-chapter', 'DocumentChapterController@createChapter')->name('document-chapters.create-chapter');
    Route::get('/document-chapters/{id}/note', 'DocumentChapterController@manageNote')->name('document-chapters.note');
    Route::get('/document-chapters/{id}/check', 'DocumentChapterController@check')->name('document-chapters.check');
    Route::get('/payment-translator/history', 'PaymentTranslatorController@history')->name('payment-translator.history');
    Route::get('/withdraw/{id}/check', 'WithdrawController@check')->name('withdraw.check');
    Route::get('/documents-download/{id}/download', 'DocumentDownloadController@download')->name('documents-download.download');

    // SPECIAL CASE
    Route::get('/home', 'AuthController@checkRedirect')->name('check-redirect');


    // PUT
    Route::put('/user/{id}/forgot-password', 'AuthController@updatePassword')->name('update-password');
    Route::put('/document-chapters/{id}/note', 'DocumentChapterController@updateNote')->name('document-chapters.note');
    Route::put('/document-chapters-translator/{id}/update-status-submit', 'DocumentChapterTranslatorController@updateStatusSubmit')->name('document-chapters-translator.updateStatusSubmit');
    Route::put('/document-chapters/{id}/afterCheckDocumentChapter', 'DocumentChapterController@afterCheckDocumentChapter')->name('document-chapters.afterCheckDocumentChapter');
    Route::put('/document-chapters/{id}/revision', 'DocumentChapterController@revisionDocumentChapter')->name('document-chapters.revision');
    Route::put('/document-chapters/{id}/unlock', 'DocumentChapterController@unlockDocumentChapter')->name('document-chapters.unlock');
    Route::put('/document-chapters/{id}/lock', 'DocumentChapterController@lockDocumentChapter')->name('document-chapters.lock');
    Route::put('/document-chapters/{id}/paidOff', 'DocumentChapterController@paidOff')->name('document-chapters.paidoff');


    // POST
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout')->name('logout');
    Route::post('/document-chapters/check-title', 'DocumentChapterController@checkSameTitle')->name('document-chapters.check-same-title');
});
