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
    return view('Inicio/inicion');
});


Route::get('/dash', 'DashBoardStoreController@index');
Route::resource('dash/articulos', 'articulocontroller');

Route::get('/dashadmin', 'DashBoardAdminController@index');
Route::get('/dashadmin/stores', 'DashBoardAdminController@tindex');

Auth::routes();
Route::get('store/{id}','storeController@index');


