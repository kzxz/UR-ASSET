<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/production', 'productionController@index')->name('production');
Route::get('production/getdata', 'productionController@getdata')->name('production.getdata');
Route::post('production/postdata', 'productionController@postdata')->name('production.postdata');
Route::post('production/prod_data', 'productionController@prod_data')->name('production.prod_data');


Route::get('/watchers', 'watchersController@index')->name('watchers');


Route::get('/egg_production', 'Egg_productionController@index')->name('egg_production');
Route::get('/egg_production/production', 'Egg_productionController@redirect')->name('egg_production.production');
Route::get('/egg_production/action', 'Egg_productionController@action')->name('egg_production.action');



Route::get('/egg_sales' , 'egg_salesController@index')->name('egg_sales');


Route::get('egg_sales/getdata', 'egg_salesController@getdata')->name('egg_sales.getdata');

Route::get('egg_sales/postdata', 'egg_salesController@postdata')->name('egg_sales.postdata');

Route::get('egg_sales/fetchdata', 'egg_salesController@fetchdata')->name('egg_sales.fetchdata');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
