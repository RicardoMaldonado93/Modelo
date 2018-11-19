<?php

require_once "./clases/ICompra.php";
require_once "./clases/Compra.php";

class CompraApi extends Compra implements ICompra {

    public static function CargarCompra( $request, $response, $args){

        $datos = $request->getParsedBody();
        $info = $datos['datos'];
        $mod = $datos['modelo'];
        $precio = $datos['precio'];
        $mar = $datos['marca'];
        $compra = Compra::RegistrarCompra($info, $mar, $mod, $precio);

        if( $compra != NULL ){
        
            $newResponse = $response->withJson($compra,200);
        }
        else
            $newResponse = $response->withJson($compra,400);

        return $newResponse;

    }

    public static function MostrarListado( $request, $response, $args){

        $lista= Compra::Listar();
        if( $lista != NULL ){
        
            $newResponse = $response->withJson($lista,200);
        }
        else
            $newResponse = $response->withJson($lista,400);

        return $newResponse;
    }

    public static function MostrarMarca( $request, $response, $args){
        $marca = $args['marca'];

        $lista= Compra::traerX($marca);

        if( $lista != NULL ){
        
            $newResponse = $response->withJson($lista,200);
        }
        else
            $newResponse = $response->withJson(strtoupper('no hay registros disponibles con la marca => '). strtoupper($marca),400);

        return $newResponse;

    }
}
?>