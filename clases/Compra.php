<?php

require_once './clases/AccesoDatos.php';

class Compra{

    public static function RegistrarCompra($datos, $marca, $modelo, $precio){

        try{

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO producto (datos, marca, modelo, precio, fechaCompra) VALUES (:dat, :mar, :mod, :pre, :fCom)");
            $consulta->bindValue(':dat', $datos, PDO::PARAM_STR);
            $consulta->bindValue(':mar', $marca, PDO::PARAM_STR);
            $consulta->bindValue(':mod', $modelo, PDO::PARAM_STR);
            $consulta->bindValue(':pre', $precio, PDO::PARAM_INT);
            $consulta->bindValue(':fCom', date ("Y-m-d H:i:s"), PDO::PARAM_STR);

            if($consulta->execute() == true)
                return "======== SE AGREGO CORRECTAMENTE ========";
                
            else
                return "*********** ERROR AL AGREGAR REGISTRO ***********";
        }
        catch( PDOException $e){

            return "*********** ERROR ***********<br>" . strtoupper($e->getMessage()) . "<br>******************************"; 
        }

    }

}
?>