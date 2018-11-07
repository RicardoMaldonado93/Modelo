<?php

require_once './vendor/autoload.php';

use Firebase\JWT\JWT;

class Token{

    private static $key = "Hitachy93";

    public static function crearToken($param){

        $hora= time();

        var_dump($param['id']);
        
        $payload = array(
            "id" => $param,
            "data" => $param,
            "iat" => $hora,
            "nbf" => 1357000000
        );
        

        return JWT::encode($payload, self::$key);

    }
}