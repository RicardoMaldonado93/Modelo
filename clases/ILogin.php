<?php

interface ILogin {
    public static function Login( $request, $response, $args);
    public static function Auth( $request, $response, $next);
    //public static function ValidarUsr( $request, $response, $next);
    
}
?>