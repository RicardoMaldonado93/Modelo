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





$logIn = function($request, $response, $next){

        $dato = $request->getHeader('token');
        $token = $dato[0];

        
        if(!Token::VerificarToken($token))
            $nresponse = $next($request, $response);
        else
            $nresponse = $response->withJson('error',404);
        
            return $nresponse;
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