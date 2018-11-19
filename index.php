<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once './api/UsuarioApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);




/*
$logIn = function($request, $response, $next){

        $dato = $request->getHeader('token');
        $token = $dato[0];

        
        if(!Token::VerificarToken($token))
            $nresponse = $next($request, $response);
        else
            $nresponse = $response->withJson('error',404);
        
            return $nresponse;
};
*/

$app->group('/api', function(){


    $this->post('/agregarUsr', \UsuarioApi::class . ':AgregarUsr');


});

$app->run();
?>