<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/register','Auth\RegisterController@register')->name('register');

Auth::routes();

Route::get('/verify/{token}','Auth\RegisterController@verify')->name('register.verify');

Route::get('/cabinet', 'Cabinet\HomeController@index')->name('cabinet');

//Route::get('/admin','Admin\HomeController@index');

//создание группы роутов
//Route::prefix('admin')->group(function(){
//    Route::middleware(['auth'])->group(function(){
//        Route::namespace('Admin')->group(function(){
//            Route::get('/', 'HomeController@index')->name('admin.home');
//            Route::get('/users', 'UsersController@index')->name('admin.users');
//            Route::get('/users/{id}', 'UsersController@show')->name('admin.users.show');
//        });
//    });
//});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',   //представление
    'namespace' => 'Admin',
    'middleware' => ['auth'],
],function(){
    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('/category', 'CategoryController');
    Route::resource('users', 'UsersController');  //генерирует все пути для crud
});
