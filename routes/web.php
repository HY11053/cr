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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function ()
{
    Route::get('/', function () {return view('admin.index');});
    Route::get('/addtemp','TempProcessController@TempAdd');
    Route::post('/addtemp','TempProcessController@PostTempAdd')->name('addtemp');
    Route::get('/templists','TempProcessController@TempList')->name('templists');
    Route::get('/tempedit/{id}','TempProcessController@TempEdit');
    Route::put('/tempedit/{id}','TempProcessController@PostTempEdit')->name('tempedit');
    Route::get('/article/list/{id}', 'ArticleProcessController@ArticleLists')->where(['id'=>'[0-9]']);
    Route::get('/article/fmimport', 'ArticleProcessController@ArticleFmImport');
    Route::post('/article/fmimport', 'ArticleProcessController@PostArticleFmImport')->name('atfmimport');
    Route::get('/article/create', 'ArticleProcessController@ArticleCreate');
    Route::post('/article/create', 'ArticleProcessController@PostArticleCreate')->name("articlecreate");
    Route::get('/article/edit/{id}', 'ArticleProcessController@ArticleEdit');
    Route::put('/article/edit/{id}', 'ArticleProcessController@PostArticleEdit')->name("article_edit");
    Route::get('/article/delete/{id}', 'ArticleProcessController@ArticleDelete');
    Route::get('/addtitle','TitleProcessController@TitleAdd');
    Route::post('/addtitle','TitleProcessController@PostTitleAdd')->name('addtitle');
    Route::get('/titlelists','TitleProcessController@TitleList')->name('titlelists');
    Route::get('/title_edit/{id}','TitleProcessController@TitleEdit');
    Route::put('/title_edit/{id}','TitleProcessController@PostTitleEdit')->name('title_edit');
    Route::get('/title/list/{id}', 'TitleStoreController@TitleLists')->where(['id'=>'[0-9]']);
    Route::get('/title/fmimport', 'TitleStoreController@TitleFmImport');
    Route::post('/title/fmimport', 'TitleStoreController@PostTitleFmImport')->name('tifmimport');
    Route::get('/title/edit/{id}', 'TitleStoreController@TitleEdit');
    Route::put('/title/edit/{id}', 'TitleStoreController@PostTitleEdit')->name("titlecon_edit");
    Route::get('/title/delete/{id}', 'TitleStoreController@TitleDelete');
});


