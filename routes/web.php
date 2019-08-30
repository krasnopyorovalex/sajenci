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
Route::pattern('alias', '[\da-z-]+');

Auth::routes(['verify' => true]);

Route::post('send-callback', 'CallbackController@callback')->name('send.callback');
Route::get('sitemap.xml', 'SitemapController@xml')->name('sitemap.xml');

Route::group(['prefix' => 'cabinet', 'middleware' => ['auth', 'verified'], 'as' => 'cabinet.'], static function () {

    Route::get('', 'CabinetController@index')->name('index');
});

Route::group(['middleware' => ['redirector', 'verified']], static function () {

    Route::get('/{alias?}/{page?}', 'CatalogController@show')->name('page.show')->where('page', '[0-9]+');
    Route::get('articles/{alias}', 'ArticleController@show')->name('article.show');
    //Route::get('catalog/{alias}', 'CatalogController@show')->name('catalog.show');
    Route::get('product/{alias}', 'CatalogProductController@show')->name('catalog_product.show');
});

Route::group(['prefix' => '_root', 'middleware' => ['auth', 'verified'], 'namespace' => 'Admin', 'as' => 'admin.'], static function () {

    Route::get('', 'HomeController@home')->name('home');

    Route::post('upload-ckeditor', 'CkeditorController@upload')->name('upload-ckeditor');

    foreach (glob(app_path('Domain/**/routes.php')) as $item) {
        require $item;
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
