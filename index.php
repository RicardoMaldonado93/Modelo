<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once './api/UsuarioApi.php';
require_once './api/LoginApi.php';
require_once './api/LogApi.php';
require_once './api/CompraApi.php';
require_once './clases/MWAuth.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->group('/api', function(){

    $this->post('/login', \loginApi::class . ':Login');

    $this->group('/usuario', function(){
        $this->post('[/]', \UsuarioApi::class . ':AgregarUsr')->add(\LogApi::class . ':Registro');
        $this->get('[/]', \UsuarioApi::class . ':MostrarUsr')->add(\LogApi::class . ':Registro', \MWAuth::class . ':Auth');
    });
    
    $this->group('/compra', function(){
        $this->post('[/]', \CompraApi::class . ':CargarCompra')->add(\LogApi::class . ':Registro', \MWAuth::class . ':VerificarUsuario');
        $this->get('[/]', \CompraApi::Class . ':MostrarListado')->add(\LogApi::class . ':Registro', \MWAuth::class . ':Auth');
        $this->get('/{marca}', \CompraApi::Class . ':MostrarMarca')->add(\LogApi::class . ':Registro', \MWAuth::class . ':Auth');
    });
    
});

$app->run();
?>