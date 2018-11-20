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

$app->post('/api/login', \loginApi::class . ':Login');
$app->group('/api', function(){

   

    $this->group('/usuario', function(){
        $this->post('[/]', \UsuarioApi::class . ':AgregarUsr');
        $this->get('[/]', \UsuarioApi::class . ':MostrarUsr')->add( \MWAuth::class . ':Auth');
    });
    
    $this->group('/compra', function(){
        $this->post('[/]', \CompraApi::class . ':CargarCompra')->add(\MWAuth::class . ':VerificarUsuario');
        $this->get('[/]', \CompraApi::Class . ':MostrarListado')->add(\MWAuth::class . ':Auth');
        $this->get('/{marca}', \CompraApi::Class . ':MostrarMarca')->add(\MWAuth::class . ':Auth');
    });

    $this->get('/productos', \CompraApi::class . ':ListarProductos');
    
})->add(\LogApi::class . ':Registro');

$app->run();
?>