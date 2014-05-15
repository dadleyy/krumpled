<?php

Route::get('/', array('as' => 'start', 'uses' => 'HomeController@startPage', 'before' => 'guest'));
Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'HomeController@dashboardPage', 'before' => 'auth'));

Route::controller('admin', 'AdminController');

Route::resource('users', 'UserController', array(
  'except' => array('index', 'create', 'show', 'edit')
));
Route::post('/signup', 'UserController@store');

Route::resource('sessions', 'SessionController', array(
  'except' => array('index', 'create', 'show', 'edit', 'update')
));
Route::post('/login', 'SessionController@store');
Route::get('/logout', array('as' => 'logout', 'uses' => 'SessionController@destroy'));

Route::post('/bankaccounts/{id}/delete', 'BankAccountsController@destroy');
Route::resource('bankaccounts', 'BankAccountsController', array(
  'except' =>  array('index', 'create', 'show', 'edit')
));

