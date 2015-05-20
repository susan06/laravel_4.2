<?php
class ProductoController extends BaseController {

    public function mostrarProductos(){

        $productos = Producto::all();
        $vendedores = Vendedor::all();
 
        return View::make('producto.lista', array('productos' => $productos, 'vendedores'=> $vendedores));
    }

    public function crearProducto(){

        $respuesta = Producto::agregarProducto(Input::all());

        if ($respuesta['error'] == true){
            return Redirect::to('producto')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('producto')->with('mensaje', $respuesta['mensaje']);
        }
    }
}

?>