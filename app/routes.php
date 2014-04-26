<?php

Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

Route::get('/', array('as' => 'home', 'uses' => 'App\Controllers\HomeController@index'));
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin|inGroup:Admins'), function() {
    Route::any('/', array('as' => 'admin.index', 'uses' =>'App\Controllers\Admin\HomeController@index'));
});
