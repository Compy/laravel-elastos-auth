<?php
/**
 * Created by PhpStorm.
 * User: compy
 * Date: 8/6/19
 * Time: 8:56 AM
 */

Route::group(['namespace' => 'Compy\LaravelElastosAuth\Http\Controllers', 'middleware' => ['web']], function() {
    Route::get('/elastos/signature', 'DIDAuthController@generateQRCode');
    Route::get('/elastos/auth', 'DIDAuthController@authOrRegister');
    Route::get('/elastos/auth/complete', 'DIDAuthController@completeAuth');
    Route::get('/elastos/checkElaAuth', 'DIDAuthController@checkElaAuth');
    Route::get('/elastos/register', 'DIDAuthController@authOrRegister');
    Route::get('/elastos/register/complete', 'DIDAuthController@completeRegistration');
});

Route::group(['namespace' => 'Compy\LaravelElastosAuth\Http\Controllers'], function() {
    Route::post('/elastos/did/callback', 'DIDAuthController@didCallback');
});