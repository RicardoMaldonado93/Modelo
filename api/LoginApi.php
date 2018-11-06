<?php

require_once "./clases/CD.php";
require_once "./clases/IApi.php";

class LoginApi extends Login implements IApi{

    public static function Login( $request, $response, $args){
        
        $datos = $request->getParsedBody();
        $user = $datos['nombre'];
        $pass = $datos['pass'];
        $login = Login::logIN($user, $pass);
        $newResponse = $response->withStatus(200);
        return $newResponse;
    }
}
?>