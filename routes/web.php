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


Auth::routes();
Route::get('/registro/{tipo}','Auth\RegisterController@showRegistrationForm');
Route::get('store/{id}','storeController@index')->where(['id' => '[\d]+']); //Ruta para una tienda, validando que sea un id.
Route::get('/liststores', 'inicioController@listatiendas'); //Ruta para listar las tiendas en el modal.
Route::resource('/serch', 'searchController'); //Ruta para la busqueda inteligente en toda la tienda.



Route::middleware('tienda')->group(function(){
Route::get('/dash', 'DashBoardStoreController@index');  
Route::resource('dash/articulos', 'articulocontroller');
Route::get('dash/articulos/{id}/status', 'articulocontroller@status')->name('articulocontroler.status');
}) ;


Route::middleware('admin')->group(function(){

Route::get('/dashadmin', 'DashBoardAdminController@index');
Route::get('/dashadmin/stores', 'DashBoardAdminController@tindex');
Route::resource('store', 'storeController');
});