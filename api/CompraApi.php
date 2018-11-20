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
        $img = $request->getUploadedFiles();
        $des = './IMGCompras/';
        $nombreAnterior = $img['imagen']->getClientFilename();
        $extension = array_reverse(explode('.', $nombreAnterior));

        if( $compra != NULL ){
        
            if(!file_exists($des))
            {
                mkdir($des);
            }

            $img['imagen']->moveTo($des.$compra.'-'.$info.'.'.$extension[0]);
            $newResponse = $response->withJson("======== SE AGREGO CORRECTAMENTE ========",200);
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

    public static function ListarProductos( $request, $response, $args){

        $listadoCompras = Compra::MostrarProductos();
        $output =array();
        $array= array();

        foreach($listadoCompras as $compra)
        {
            $objeto = array( "Marca" => $compra->marca , "Modelo" => $compra->modelo);
            //$objeto = "{'marca':"=>$compra->marca,"'modelo':". $compra->modelo."}";
            array_push($output, array_unique($objeto));
        }

        $newResponse = $response->withJson($output, 200);
        return $newResponse;
    }
}
?>