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

    public static function Auth( $request, $response, $next){

        try{

            $token = $request->getHeader('token');
            $status = Token::VerificarToken($token[0]);

                if( $status ){

                    $payload =Token::ObtenerData($token[0]);

                    if($payload[0]->{'perfil'} == 'admin')
                        return $next($request,$response);
                    else
                        return $response->withJson('HOLA', 401);
                }
                
        }
        catch( Exception $e){
            return $response->withJson($e->getMessage(),401);
        }

    }

    /*
    public static function ValidarUsr( $request, $response, $next){
        
        $dato = $request->getHeader('token');
        $token = $dato[0];
    

        if( Token::ObtenerData($token)[0]->{'nombre'} != 'admin' )
            $nresponse = $response->withJson('error',404);
        else
            $nresponse = $next($request, $response);

        return $nresponse;
    
    }*/


  }
?>