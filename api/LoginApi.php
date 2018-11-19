<?php

require_once "./clases/Login.php";
require_once "./clases/ILogin.php";
require_once './clases/Token.php';

class LoginApi extends Login implements ILogin{

    public static function Login( $request, $response, $next){
        
        $datos = $request->getParsedBody();
        $user = $datos['email'];
        $pass = $datos['pass'];
        $login = Login::loguear($user, $pass);
    
        
        if( $login != NULL ){
            
       
            $newResponse = $response->withJson(Token::crearToken($login),200);
            //$newResponse = $response->withJson($login,200);
            //var_dump(Token::crearToken($login));
            //$newResponse= $next( $request, $response);
        }
        else
            $newResponse = $response->withStatus(400);

        return $newResponse;
    }



  }
?>