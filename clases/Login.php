<?php

require_once './clases/AccesoDatos.php';


class Login{

    public static function loguear($user, $pass){
        try{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta= $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuario Where email=:email AND pass=:pass");
            $verificar= $objetoAccesoDato->RetornarConsulta()
            $consulta->bindValue(':pass',$pass, PDO::PARAM_STR);
            if($consulta->execute())
            
            if ($consulta->bindValue(':email',$user, PDO::PARAM_STR);)
               of
            
            return$consulta->fetchAll(PDO::FETCH_CLASS, 'Login');
              
 
        
            }
        catch (PDOException $e){
            echo "*********** ERROR ***********<br>" . strtoupper($e->getMessage()); 
        }
    }
}
?>