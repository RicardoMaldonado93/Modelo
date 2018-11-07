<?php

require_once './vendor/autoload.php';

use Firebase\JWT\JWT;

class Token{

    private static $key = "Hitachy93";
    private static $aud = null;

    public static function crearToken($param){

        $hora= time();

        $payload = array(
            "aud" => self::Aud(),
            "data" => $param,
            "iat" => $hora,
            "nbf" => 1357000000
        );
        

        return JWT::encode($payload, self::$key);

    }

    private static function Aud()
    {
        $aud = '';
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }
        
        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();
        
        return sha1($aud);
    }
}