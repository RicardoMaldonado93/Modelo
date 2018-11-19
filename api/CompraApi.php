<?php

require_once "./clases/ICompra.php";
require_once "./clases/Compra.php";

class CompraApi extends Compra implements ICompra {

    public static function CargarCompra( $request, $response, $arg){

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
}
?>