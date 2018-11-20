<?php

require_once './clases/AccesoDatos.php';

class Log{

    public static function Registrar($usr, $metodo, $ruta){
        try{

            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO registro (usuario, metodo, ruta, hora) VALUES (:usr,:met,:ruta,:fecha)");
            $consulta->bindValue(':usr', $usr , PDO::PARAM_STR);
            $consulta->bindValue(':met', $metodo , PDO::PARAM_STR);
            $consulta->bindValue(':ruta', $ruta , PDO::PARAM_STR);
            $consulta->bindValue(':fecha', date ("Y-m-d H:i:s") , PDO::PARAM_STR);
            $consulta->execute();

        }
        catch( PDOException $e){

            return "*********** ERROR ***********<br>" . strtoupper($e->getMessage()) . "<br>******************************"; 
        }
    }
}
?>