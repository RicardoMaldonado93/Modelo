<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once './api/CDApi.php';
require_once './api/LoginApi.php';
require_once './clases/Token.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);





$logIn = function($response, $request, $next){

        $dato = $response->getHeader('token');
        $token = $dato[0];
        var_dump(Token::VerificarToken( $token));
                    //$response = $next($response, $request);
        
        //return $response;
};

/*$nivel = function($response, $request, $next){

        $token = $response->getHeader('token');
    
        if( Token::class . )
        
};*/

$app->group('/cds', function(){

    $this->get('/traerTodos', \CDApi::class . ':TraerTodos');

    $this->get('/{id}', \CDApi::class . ':TraerUnCD');

    $this->post('/', \CDApi::class . ':AgregarUnCD');

    $this->delete('/', \CDApi::class . ':BorrarUnCD');
    
    $this->put('/', \CDApi::class . ':ModificarUnCD');

})->add($logIn)->add(\LoginApi::class . ':Login');

$app->run();
?>