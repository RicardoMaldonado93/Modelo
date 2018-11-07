<?php

require_once "./clases/Login.php";
require_once "./clases/IApi2.php";
require_once './clases/Token.php';

class LoginApi extends Login implements IApi2{

    public static function Login( $request, $response, $args){
        
        $datos = $request->getParsedBody();
        $user = $datos['nombre'];
        $pass = $datos['pass'];
        $login = Login::loguear($user, $pass);
        
        
        if( $login != NULL )
        
            $newResponse = $response->withJson(Token::crearToken($login),200);
        else
            $newResponse = $response->withJson("USUARIO NO VALIDO",404);

        return $newResponse;
    }

 
  }
?>