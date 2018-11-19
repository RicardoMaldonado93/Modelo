<?php

require_once "./clases/AccesoDatos.php";

class Usuario {

    public static function agregarUsuario ($nombre, $email, $perfil, $pass){
        try{
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO usuario (nombre, email, perfil, pass) VALUES (:nom, :email,:per, :pass)");
            $consulta->bindValue(':nom', $nombre, PDO::PARAM_STR);
            $consulta->bindValue(':email', $email, PDO::PARAM_STR);
            $consulta->bindValue(':per', $perfil, PDO::PARAM_STR);
            $consulta->bindValue(':pass', $pass, PDO::PARAM_STR);

            if($consulta->execute() == true)
                return " ======== SE AGREGO CORRECTAMENTE ========<br>";
                
            else
                return "*********** ERROR AL AGREGAR REGISTRO ***********";
        }
        catch( PDOException $e){

            return "*********** ERROR ***********<br>" . strtoupper($e->getMessage()) . "<br>******************************"; 
        }
    }


}
?>