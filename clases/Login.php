<?php

require_once './clases/AccesoDatos.php';
require_once './clases/Token.php';

class Login{

    public static function loguear($user, $pass){
        try{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta= $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios Where nombre=:nombre AND pass=:pass");
            $consulta->bindValue(':nombre',$user, PDO::PARAM_STR);
            $consulta->bindValue(':pass',$pass, PDO::PARAM_STR);
            $consulta->execute();
            $Lista = $consulta->fetchAll(PDO::FETCH_CLASS, 'Login');
            if( $Lista != NULL){
            
                $JWT= Token::crearToken($Lista);
               
                var_dump($JWT);
            }
            else
                echo "No se encuentra registro";
        
            }
        catch (PDOException $e){
            echo "*********** ERROR ***********<br>" . strtoupper($e->getMessage()); 
        }
    }
}
?>