<?php

require_once "DBPDO.php";
require_once "UsuarioDB.php";

class UsuarioPDO implements UsuarioDB {

    /**
     * @function validarUsuario($CodUsuario, $Password)
     * 
     * Funcion que comprueba que las credenciales del usuario sean correctas
     * 
     * @param  string $CodUsuario, string $Password
     * 
     * @return array con los datos del Usuario
     * 
     */
    public static function validarUsuario($CodUsuario, $Password) {
        $consulta = "SELECT * FROM T01_Usuarios1 WHERE T01_CodUsuario=? AND T01_Password=SHA2(?, 256)"; //Creo el query
        $aUsuario = []; //Array para almacenar los datos del usuario
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodUsuario, $Password]); //Ejecutamos la consulta
        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta
            $resFetch = $resConsulta->fetchObject(); //Almaceno los datos del usuario en un array
//Metemos los resultados de la consulta en el array
            $aUsuario['CodUsuario'] = $resFetch->T01_CodUsuario;
            $aUsuario['Password'] = $resFetch->T01_Password;
            $aUsuario['DescUsuario'] = $resFetch->T01_DescUsuario;
            $aUsuario['NumAccesos'] = $resFetch->T01_NumAccesos;
            $aUsuario['FechaHoraUltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
            $aUsuario['Perfil'] = $resFetch->T01_Perfil;
        }
        return $aUsuario;   //Devuelvo el array con los datos del usuario   
    }

    public static function altaUsuario($CodUsuario, $Password,$DescUsuario) {
        $UsuarioCreado=false;
        $consulta = "INSERT INTO T01_Usuarios1 VALUES (?,SHA2(?, 256),?,0,null,'usuario')";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodUsuario, $Password,$DescUsuario]);
        if ($resConsulta->rowCount() != 0) { 
            $UsuarioCreado = true;
        }
        return $UsuarioCreado;
    }

    public static function modificarUsuario() {
        
    }

    public static function borrarUsuario() {
        
    }

    public static function registrarUltimaConexion($CodUsuario) {
        $consulta = "UPDATE T01_Usuarios1 SET T01_NumAccesos=+1,T01_FechaHoraUltimaConexion=? WHERE T01_CodUsuario=?";
        $fecha = new DateTime();
        $fecha->getTimestamp();
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$fecha,$CodUsuario]); //Ejecutamos la consulta
    }

    public static function validarCodNoExiste($CodUsuario) {
        $existe = false;
        $consulta = "SELECT * FROM T01_Usuarios1 WHERE T01_CodUsuario=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodUsuario]); 
        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $existe = true;
        }
        return $existe;
    }

    public static function buscaUsuariosPorDesc() {
        
    }

    public static function creaOpinion() {
        
    }

    public static function modificaOpinion() {
        
    }

    public static function borraOpinion() {
        
    }

}

?>