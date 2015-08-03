<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function(){

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    Route::group(['prefix' => 'project'], function(){

        Route::resource('', 'ProjectController', ['except' => ['create', 'edit']]);

        Route::get('note', 'ProjectNoteController@index');
        Route::post('note', 'ProjectNoteController@store');
        Route::get('note/{id}', 'ProjectNoteController@show');
        Route::put('note/{id}', 'ProjectNoteController@update');
        Route::delete('note/{id}', 'ProjectNoteController@destroy');

    });


});