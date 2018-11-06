<?php

require_once './AccesoDatos.php';

class Login{

    public static function logIN($user, $pass){
        try{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta= $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios Where nombre=:nombre and pass=:pass");
            $consulta->bindValue(':nombre',$id, PDO::PARAM_STR);
            $consulta->bindValue(':nombre',$pass, PDO::PARAM_STR);
            $consulta->execute();
            $Lista = $consulta->fetchAll(PDO::FETCH_CLASS, 'Login');
            if( $Lista != NULL)
                return $Lista;
            else
                echo "No se encuentra registro";
        
            }
        catch (PDOException $e){
            echo "*********** ERROR ***********<br>" . strtoupper($e->getMessage()); 
        }
}
?>