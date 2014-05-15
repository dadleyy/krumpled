<?php

Route::get('/', array('as' => 'start', 'uses' => 'HomeController@startPage'));

Route::post('/signup', 'UserController@postIndex');
Route::controller('users', 'UserController');

Route::controller('sessions', 'SessionController');
Route::post('/login', 'SessionController@postIndex');
Route::get('/logout', 'SessionController@deleteIndex');
