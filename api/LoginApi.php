<?php

require_once "./clases/Login.php";
require_once "./clases/IApi2.php";
require_once './clases/Token.php';

class LoginApi extends Login implements IApi2{

    public static function Login( $request, $response, $next){
        
        $datos = $request->getParsedBody();
        $user = $datos['nombre'];
        $pass = $datos['pass'];
        $login = Login::loguear($user, $pass);
    
        
        if( $login != NULL ){
            
            $newResponse = $response->withHeader('Content-Type', 'application/json')
                                    ->write(json_encode(Token::crearToken($login)));//withJson(Token::crearToken($login),200);
            $newResponse = $next( $request, $response);
        }
        else
            $newResponse = $response->withJson("USUARIO NO VALIDO",404);

        return $newResponse;
    }

    public function HabilitarCORS8080($request, $response, $next) {
		/*
		al ingresar no hago nada
		*/
		 $response = $next($request, $response);
        // $response->getBody()->write('<p>habilitado HabilitarCORS8080</p>');
        var_dump($response);
   		 return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:8080')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
	}
  }
?>