<?php

require_once './clases/AccesoDatos.php';


class Login{

    public static function loguear($email, $pass){
        try{
              
            if( self::verificar('email','usuario',$email) != NULL)
                if( self::verificar('pass','usuario',$pass) != NULL)
                    {
                        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
                        $consulta= $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuario Where email=:email AND pass=:pass");
                        $consulta->bindValue(':email', $email, PDO::PARAM_STR);
                        $consulta->bindValue(':pass',$pass, PDO::PARAM_STR);
                        $consulta->execute();
                        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Login');
                    }
                else
                throw new PDOException("password invalido!");
            else
                throw new PDOException("email no existente!");
 
        
            }
        catch (PDOException $e){
            echo "*********** ERROR ***********<br><br>" . strtoupper($e->getMessage()); 
        }
    }

    private static function verificar( $cel, $tab, $param){

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $verificar= $objetoAccesoDato->RetornarConsulta('SELECT '. $cel . ' ' .'FROM' .' '  . $tab . ' '.  'WHERE' .' ' . $cel . '=:param');
        $verificar->bindValue(':param', $param, PDO::PARAM_STR);
        $verificar->execute();
        
        return $verificar->fetchAll(PDO::FETCH_CLASS, 'Login');

    }
}
?>