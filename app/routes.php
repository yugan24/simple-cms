<?php

Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

Route::get('/', array('as' => 'home', 'uses' => 'App\Controllers\HomeController@index'));
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin|inGroup:Admin'), function() {
    Route::any('/', array('as' => 'admin.index', 'uses' => 'App\Controllers\Admin\HomeController@index'));
    Route::resource('users', 'App\Controllers\Admin\UserController');
});

Route::get('install',  array('as' => 'install', function($key = null)  {
try {
      echo '<br>init migrate:install...';
      Artisan::call('migrate:install');
      echo 'done migrate:install';
      
      echo '<br>init with tables migrations...';
      Artisan::call('migrate', [
        '--path'     => "app/database/migrations"
        ]);
      echo '<br>done with tables migrations';
      echo '<br>init tables seeder...';
      Artisan::call('db:seed');
      echo '<br>done';
       return Redirect::route('admin.login');
    } catch (\Exception $e) {
      return Response::make($e->getMessage(), 500);
    }
}));

Route::get('reset',  array('as' => 'reset', function($key = null)  {
    try {
      echo '<br>init migrate:refresh...';
      Artisan::call('migrate:refresh');
      Artisan::call('db:seed');
      echo '<br>done';
       return Redirect::route('admin.login');
    } catch (Exception $e) {
      Response::make($e->getMessage(), 500);
    }
}));