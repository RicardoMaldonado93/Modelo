<?php

require_once './clases/ILog.php';
require_once './clases/Log.php';

class LogApi extends Log implements ILog{

    public static function Registro($request, $response, $next){
       
        $token = $request->getHeader('token');
        $status = Token::VerificarToken($token[0]);

            if( $status ){

                $payload =Token::ObtenerData($token[0]);
                $usr = $payload[0]->{'perfil'};
                $met = $request->getMethod();
                $ruta = $request->getUri()->getPath();
                Log::Registrar($usr, $met, $ruta);

                
                
            }
        
        return $next($request,$response);
            
    }
}
?>