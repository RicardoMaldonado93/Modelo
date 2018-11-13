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
    
    public static function VerificarToken($token)
    {
        if(empty($token))
        {
            throw new Exception("El token esta vacio.");
        } 
        // las siguientes lineas lanzan una excepcion, de no ser correcto o de haberse terminado el tiempo       
      
      try {
            $decodificado = JWT::decode(
            $token,
            self::$claveSecreta,
            self::$tipoEncriptacion
        );
        } catch (Exception $e) {
            throw $e;
        } 
        
        // si no da error,  verifico los datos de AUD que uso para saber de que lugar viene  
        if($decodificado->aud !== self::Aud())
        {
            throw new Exception("No es el usuario valido");
        }
    }
    
   
     public static function ObtenerPayLoad($token)
    {
        return JWT::decode(
            $token,
            self::$claveSecreta,
            self::$tipoEncriptacion
        );
    }
     public static function ObtenerData($token)
    {
        return JWT::decode(
            $token,
            self::$claveSecreta,
            self::$tipoEncriptacion
        )->data;
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