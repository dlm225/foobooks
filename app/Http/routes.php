<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        ##return view('welcome');
        return 'Hello - welcome to my Laravel application!';
    });

    Route::get('/books', 'BookController@getIndex');
    Route::get('/book/create', 'BookController@getCreate');
    Route::post('/book/create', 'BookController@postCreate');
    Route::get('/book/show/{title?}', 'BookController@getShow');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('/practice', function() {

        $random = new Random();
        return $random->getRandomString(10);

    });

});
