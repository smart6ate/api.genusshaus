<?php

Route::group(['prefix' => '/v1', 'namespace' => 'iOS'], function () {


    Route::get('/devices', 'Devices\DevicesController@index');
    Route::get('/device/register', 'Devices\DevicesController@register');

    Route::post('/pushtoken', 'Devices\PushTokensController@update');

    Route::get('/information', 'Information\InformationController@index');

    Route::get('/beacon', 'Beacons\BeaconsController@index');
    Route::post('/beacon', 'Beacons\BeaconsController@show');
    // Ylber Veliu - Vizah GmbH
    Route::post('/notification', 'Beacons\BeaconsController@notification');

    Route::post('/search', 'Search\SearchController@search');
    Route::post('/search/phrase', 'Search\SearchController@log');

    Route::group(['namespace' => 'Places'], function () {
        Route::group(['prefix' => '/places'], function () {
            Route::get('/', 'PlacesController@index');
            Route::post('/show', 'PlacesController@show');
        });
    });

    Route::group(['prefix' => '/articles', 'namespace' => 'Posts'], function () {
        Route::get('/', 'PostsController@index');
        Route::post('/show', 'PostsController@show');
    });

    Route::group(['prefix' => '/events', 'namespace' => 'Events'], function () {
        Route::get('/', 'EventsController@index');
        Route::post('/show', 'EventsController@show');
    });

    Route::group(['prefix' => '/favourites', 'namespace' => 'Favourites'], function () {
        Route::post('/', 'FavouritesController@index');
        Route::post('/add', 'FavouritesController@add');
        Route::post('/remove', 'FavouritesController@remove');
    });
});
