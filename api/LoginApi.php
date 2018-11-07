<?php

require_once "./clases/Login.php";
require_once "./clases/IApi2.php";

class LoginApi extends Login implements IApi2{

    public static function Login( $request, $response, $args){
        
        $datos = $request->getParsedBody();
        $user = $datos['nombre'];
        $pass = $datos['pass'];
        $login = Login::loguear($user, $pass);
        $newResponse = $response->withJson($login,200);
        return $newResponse;
    }

  }
?>