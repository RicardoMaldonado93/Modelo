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

$app->group('/cds', function(){

    $this->get('/traerTodos', \CDApi::class . ':TraerTodos');

    $this->get('/traerUnCD/{id}', \CDApi::class . ':TraerUnCD');

    $this->post('/agregarUnCD', \CDApi::class . ':AgregarUnCD');

    $this->delete('/borrarUnCD/{id}', \CDApi::class . ':BorrarUnCD');
    
    $this->put('/modificarUnCD/{id}', \CDApi::class . ':ModificarUnCD');
})->add( $app->post(('/login'),LoginApi::class . ':Login'));
$app->run();
?>