<?php

Route::group(['prefix' => '/v1/landingpage', 'namespace' => 'Web'], function () {

        Route::get('/places', 'PlacesController@index');
        Route::get('/places/show/{place}', 'PlacesController@show');
        Route::get('/places/recommendations/{place}', 'PlacesController@recommendations');

});
