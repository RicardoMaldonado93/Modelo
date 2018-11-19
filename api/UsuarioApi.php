<?php

require_once "./clases/IUsuario.php";
require_once "./clases/Usuario.php";


class UsuarioApi extends Usuario implements IUsuario{

    public static function AgregarUsr($request, $response, $args){

        $datos = $request->getParsedBody();

        $nr = Usuario::AgregarUsuario($datos['nombre'],$datos['email'],$datos['perfil'],$datos['pass']);
        
         
        if( $nr != NULL ){
        
            $newResponse = $response->withJson($nr,200);
        }
        else
            $newResponse = $response->withJson($nr,400);

        return $newResponse;
    }

    public static function MostrarUsr($request, $response, $args){
        return $response->withJson(Usuario::mostrarTodos(),200);
    }
}
?>