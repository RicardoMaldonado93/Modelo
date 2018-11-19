<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once './api/UsuarioApi.php';
require_once './api/LoginApi.php';
require_once './api/CompraApi.php';
require_once './clases/MWAuth.php';

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


    $this->post('/usuario', \UsuarioApi::class . ':AgregarUsr');
    $this->post('/login', \loginApi::class . ':Login');
    $this->get('/usuario', \UsuarioApi::class . ':MostrarUsr')->add(\loginApi::class . ':Auth');
    $this->post('/compra', \CompraApi::class . ':CargarCompra')->add(\MWAuth::class . ':VerificarUsuario');

});

$app->run();
?>