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
Route::get('/logout', 'Auth\LoginController@logout')->name('home');

Route::middleware(['auth'])->group(function ()
{
    Route::get('/','IndexController@Index');
    Route::get('/addtemp','TempProcessController@TempAdd');
    Route::post('/addtemp','TempProcessController@PostTempAdd')->name('addtemp');
    Route::get('/templists','TempProcessController@TempList')->name('templists');
    Route::get('/tempedit/{id}','TempProcessController@TempEdit');
    Route::put('/tempedit/{id}','TempProcessController@PostTempEdit')->name('tempedit');
    Route::get('/article/list', 'ArticleProcessController@AllArticleLists');
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
    Route::get('/title/list', 'TitleStoreController@AllTitleLists');
    Route::get('/title/list/{id}', 'TitleStoreController@TitleLists')->where(['id'=>'[0-9]']);
    Route::get('/title/fmimport', 'TitleStoreController@TitleFmImport');
    Route::post('/title/fmimport', 'TitleStoreController@PostTitleFmImport')->name('tifmimport');
    Route::get('/title/edit/{id}', 'TitleStoreController@TitleEdit');
    Route::put('/title/edit/{id}', 'TitleStoreController@PostTitleEdit')->name("titlecon_edit");
    Route::get('/title/delete/{id}', 'TitleStoreController@TitleDelete');
    //品牌数据导入
    Route::get('brandtypelist','BrandTypeController@brandTypeLIst')->name('brandtypelist');
    Route::get('brandtypecreate','BrandTypeController@brandTypeCreate');
    Route::post('brandtypecreate','BrandTypeController@postBrandTypeCreate')->name('addbrandtype');
    Route::get('brandtype/edit/{id}','BrandTypeController@brandTypeEdit');
    Route::put('brandtype/edit/{id}','BrandTypeController@postBrandTypeEreate')->name('editbrandtype');
    Route::get('brandtype/delete/{id}','BrandTypeController@brandTypeDelete');
    Route::get('brandlists','BrandController@brandListsView')->name('pbrandlists');
    Route::get('branddatas/del/{id}','BrandController@Delete');
    Route::post('brandstatus/{id}', 'BrandController@Status')->name('status');
    Route::get('importbrands','BrandController@brandsImport');
    Route::post('importbrands','BrandController@postBrandsImport')->name('importbd');
    Route::put('importbrands','BrandController@postBrandsImport')->name('importbrands');

});


