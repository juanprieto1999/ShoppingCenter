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
//ruta del ban
Route::get('/ban', function () {
    return view('ban');
});

Auth::routes();


Route::get('/registro/{tipo}','Auth\RegisterController@showRegistrationForm');
Route::get('store/{id}','storeController@index')->where(['id' => '[\d]+']); //Ruta para una tienda, validando que sea un id.
Route::get('/liststores', 'inicioController@listatiendas'); //Ruta para listar las tiendas en el modal.
Route::resource('/serch', 'searchController'); //Ruta para la busqueda inteligente en toda la tienda.
Route::resource('/store', 'searchController');


Route::middleware('tienda')->group(function(){
Route::get('/dash', 'DashBoardStoreController@index'); 
Route::resource('/dash/sale', 'SaleController'); 
Route::get('dash/sale/{id}/{status}', 'SaleController@Status')->name('sale.statussale');
Route::resource('dash/articulos', 'articulocontroller');
Route::get('dash/articulos/{id}/status', 'articulocontroller@status')->name('articulocontroler.status');
});

Route::middleware('admin')->group(function(){
Route::get('/dashadmin', 'DashBoardAdminController@index');
Route::get('/dashadmin/stores', 'DashBoardAdminController@tindex');
Route::resource('/dashadmin/users', 'userController');
Route::resource('store', 'storeController');
});



Route::bind('product',function($id){
	return App\Models\articulo::where('idArticulo',$articulo)->first();
});

//Carrito
Route::get('cart/show',[
'as' => 'cart-show',
'uses'=> 'CartController@show'
]); //mostrar el producto dentro del carrito


Route::get('Password/reset','Auth/ForgotPasswordController@showLinkRequestForm')->name('Password.request');
Route::post('Password/email','Auth/ForgotPasswordController@sendResetLinkEmail')->name('Password.email');
Route::get('Password/reset/{token}','Auth/ResetPasswordController@showResetForm')->name('Password.reset');
Route::post('Password/reset','Auth/ResetPasswordController@reset');

Route::get('/','inicioController@index')->name('inicion');




//agregar al carrito
Route::get('cart/add/{articulo}',[
'as' => 'cart-add',
'uses'=> 'CartController@add'
]);

//eliminar del carrito
Route::get('cart/delete/{articulo}',[
'as' => 'cart-delete',
'uses'=> 'CartController@delete'
]);

//vaciar  carrito
Route::get('cart/trash',[
'as' => 'cart-trash',
'uses'=> 'CartController@trash'
]);

//Actualizar el carrito
Route::get('cart/update/{articulo}/{cantidad?}',[
'as' => 'cart-update',
'uses'=> 'CartController@update'
]);

//Detalles del carrito
Route::get('order-detail',[
'middleware' => 'auth',
'as' => 'order-detail',
'uses'=> 'CartController@orderdetail'
]);

//Paypal
//Enviamps nuestro pedido a paypal
Route::get('payment',array(
'as' => 'payment',
'uses'=> 'PaypalController@postPayment'
));
//Paypal redirecciona a esta rutaz
Route::get('payment/status',array(
'as' => 'payment.status',
'uses'=> 'PaypalController@getPaymentStatus'
));

//Redireccionar a vista detalles
Route::get('articulo/{id}',[
'as' => 'articulo-detail',
'uses'=> 'storeController@show']);




