<?php
Route::get('/', function()
{   

    $vendedores = Vendedor::with('productos')->get();
    return View::make('inicio', array('vendedores'=> $vendedores));
});

Route::get('vendedor', 'VendedorController@mostrarVendedores');

Route::post('vendedor', 'VendedorController@crearVendedor');

Route::get('producto', 'ProductoController@mostrarProductos');

Route::post('producto', 'ProductoController@crearProducto');
?>