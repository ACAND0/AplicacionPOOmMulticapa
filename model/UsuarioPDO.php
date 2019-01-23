<?php
require_once "DBPDO.php";
require_once "UsuarioDB.php";

class UsuarioPDO implements UsuarioDB {

        /**
     * @function validarUsuario($codUsuario, $password)
     * 
     * Funcion que comprueba que las credenciales del usuario sean correctas
     * 
     * @param  string $codUsuario, string $password
     * 
     * @return array con los datos del Usuario
     * 
     */
    public static function validarUsuario($codUsuario, $password) {
        $consulta = "SELECT * FROM T01_Usuarios1 WHERE T01_CodUsuario=? AND T01_Password=SHA2(?, 256))"; //Creo el query
        $aUsuario = [];//Array para almacenar los datos del usuario
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario,$password]); //Ejecutamos la consulta
        if ($resConsulta->rowCount()==1){ //Comprobamos si se han obtenido resultados en la consulta
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

    public static function altaUsuario() {
        
    }

    public static function modificarUsuario() {
        
    }

    public static function borrarUsuario() {
        
    }

    public static function registrarUltimaConexion() {
        
    }

    public static function validarCodNoExiste() {
        
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