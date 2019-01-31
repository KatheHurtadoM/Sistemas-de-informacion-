<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('clientes', 'ClienteController');
Route::resource('categorias', 'CategoriaController');
Route::resource('almacenes', 'AlmacenController');
Route::resource('devoluciones', 'DevolucionController');
Route::resource('entregas', 'EntregaController');
Route::post('ordenes/realizar-asignacion/{orden}', 'OrdenController@realizarAsignacion')->name('ordenes.asignarme');
Route::get('ordenes/ver', 'OrdenController@indexCliente')->name('ordenes.ver');
Route::resource('ordenes', 'OrdenController');
Route::get('ver/productos', 'ProductoController@indexCliente')->name('productos.ver');
Route::resource('productos', 'ProductoController');
Route::resource('roles', 'RolController');
Route::resource('zonas', 'ZonaController');

Route::get('card/ver', 'CartController@show')->name('cart.ver');
Route::get('card/confirmar', 'CartController@confirmar')->name('cart.confirmar');
Route::resource('cart', 'CartController');