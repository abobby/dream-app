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

//Route::get('/', 'IndexController@index');

Route::group(['prefix'=>'/'], function(){
    Route::get('/', 'ListingController@index');
    Route::get('/item-detail/{id}', 'ListingController@listingDetail');
    Route::get('/item-review/{id}', 'ListingController@listingReviews');
    Route::get('/item-search', 'ListingController@searchItems');
    Route::post('/item-search-result', 'ListingController@searchItemsResult');
    Route::post('/interest-submit', 'ListingController@interestSubmit');

});


Route::group(['prefix'=>'/seller'], function(){
    Route::get('/', 'ListingController@index');
    Route::get('/item-detail/{id}', 'ListingController@listingDetail');
    Route::get('/item-review/{id}', 'ListingController@listingReviews');

});


Route::group(['prefix'=>'/buyer'], function(){
    Route::get('/', 'ListingController@index');
    Route::get('/item-detail/{id}', 'ListingController@listingDetail');
    Route::get('/item-review/{id}', 'ListingController@listingReviews');

});