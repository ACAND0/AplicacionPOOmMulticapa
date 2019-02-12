<?php

/**
 * Archivo UsuarioPDO.php
 * 
 * Este archivo contiene una clase con varias funciones, las cuales manejan las operaciones
 * relacionadas con los objetos Usuarios en nuestra aplicación, es utilizada por la clase Usuario
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package model
 */
require_once "DBPDO.php";

/**
 *  Class UsuarioPDO
 * 
 * Contiene funciones que operan con objetos Usuarios directamente ejecutando querys con la clase
 * DBPDO 
 * 
 * @author Adrián Cando Oviedo
 * @modifiedDate 11/02/2019
 * @version 2.6
 * 
 */
class UsuarioPDO {

    /**
     * public static function validarUsuario($codUsuario, $Password)
     * 
     * Consulta todos los usuarios existentes en la base de datos con ese codigo de usuario y esa contraseña
     * 
     * @param string $codUsuario
     * @param string $Password
     * @return array Array con los datos del usuario
     */
    public static function validarUsuario($codUsuario, $Password) {
        $consulta = "SELECT * FROM T01_Usuarios1 WHERE T01_CodUsuario=? AND T01_Password=SHA2(?, 256)"; //Creo el query
        $aUsuario = []; //Array para almacenar los datos del usuario
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codUsuario, $Password]); //Ejecutamos la consulta
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

    /**
     * public static function altaUsuario($codUsuario, $Password, $DescUsuario)
     * 
     * Inserta un usuario en la tabla con los parámetros recibidos y 
     * 3 por defecto a null(fechaUltimaVisita), 0(visitas) y usuario(perfil)
     * 
     * @param string $codUsuario
     * @param string $Password
     * @param string $DescUsuario
     * @return boolean Si se insertado o no el usuario correctamente en la base de datos
     */
    public static function altaUsuario($codUsuario, $Password, $DescUsuario) {
        $UsuarioCreado = false;
        $consulta = "INSERT INTO T01_Usuarios1 VALUES (?,SHA2(?, 256),?,0,null,'usuario')";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codUsuario, $Password, $DescUsuario]);
        if ($resConsulta->rowCount() != 0) {
            $UsuarioCreado = true;
        }
        return $UsuarioCreado;
    }

    /**
     * public static function modificarUsuario($codUsuario, $DescUsuario, $Perfil, $Password)
     * 
     * Dependiendo desde donde utlicemos esta función, pasaremos unos parámetros con unos valores u otros
     * Si la contrasña y el perfil son nulos quiere decir que sólo editaremos la descripción caso de MiCuenta
     * Estos dos siguientes se utilizan en el caso de editar usuario desde el mantenimiento:
     * Si la contraseña es nula editaremos la descripción y el perfil
     * Y si todos contienen valores editamos todo
     * 
     * @param string $codUsuario
     * @param string $DescUsuario
     * @param string $Perfil
     * @param string $Password
     * @return boolean Si se ha modificado correctamente el usuario
     */
    public static function modificarUsuario($codUsuario, $DescUsuario, $Perfil, $Password) {
        $UsuarioModificado = false;

        if ($Password == null && $Perfil == null) {
            $consulta = "UPDATE T01_Usuarios1 SET T01_DescUsuario=? WHERE T01_CodUsuario=?";
            $resConsulta = DBPDO::ejecutarConsulta($consulta, [$DescUsuario, $codUsuario]);
        } else if ($Password == null) {
            $consulta = "UPDATE T01_Usuarios1 SET T01_DescUsuario=?,T01_Perfil=? WHERE T01_CodUsuario=?";
            $resConsulta = DBPDO::ejecutarConsulta($consulta, [$DescUsuario, $Perfil, $codUsuario]);
        } else {
            $consulta = "UPDATE T01_Usuarios1 SET T01_DescUsuario=?,T01_Perfil=?,T01_Password=SHA2(?, 256) WHERE T01_CodUsuario=?";
            $resConsulta = DBPDO::ejecutarConsulta($consulta, [$DescUsuario, $Perfil, $Password, $codUsuario]);
        }

        if ($resConsulta->rowCount() != 0) {
            $UsuarioModificado = true;
        }
        return $UsuarioModificado;
    }

    /**
     * public static function cambiarPassword($password, $codUsuario)
     * 
     * Modificamos la contraseña codificandola en el query con SHA256
     * 
     * @param string $password
     * @param string $codUsuario
     * @return boolean Si la contraseña ha sido modificada correctamente
     */
    public static function cambiarPassword($password, $codUsuario) {
        $passwordModificado = false;
        $consulta = "UPDATE T01_Usuarios1 SET T01_Password=SHA2(?, 256) WHERE T01_CodUsuario=?"; //Creo el query
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$password, $codUsuario]);
        if ($resConsulta->rowCount() != 0) {
            $passwordModificado = true;
        }
        return $passwordModificado;
    }

    /**
     * public static function borrarUsuario($codUsuario)
     * 
     * Eliminamos un usuario segú su código
     * 
     * @param string $codUsuario
     * @return boolean Sis e ha eliminado de la tabla satisfactoriamente
     */
    public static function borrarUsuario($codUsuario) {
        $eliminado = false;
        $consulta = "DELETE FROM T01_Usuarios1 WHERE T01_CodUsuario=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codUsuario]); //Ejecutamos la consulta
        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $eliminado = true;
        }
        return $eliminado;
    }

    /**
     * public static function registrarUltimaConexion($codUsuario)
     * 
     * Actualizamos la columna de T01_FechaHoraUltimaConexion con la nueva fecha y hora actual y la de
     * T01_NumAccesos sumandole +1
     * 
     * @param string $codUsuario
     * @return boolean Si se ha registrado correctamente
     */
    public static function registrarUltimaConexion($codUsuario) {
        $registrado = false;
        $consulta = "UPDATE T01_Usuarios1 SET T01_NumAccesos=T01_NumAccesos+1,T01_FechaHoraUltimaConexion=? WHERE T01_CodUsuario=?";
        $fecha = new DateTime();

        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$fecha->getTimestamp(), $codUsuario]); //Ejecutamos la consulta

        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $registrado = true;
        }
        return $registrado;
    }

    /**
     * public static function validarCodNoExiste($codUsuario)
     * 
     * Validamos que el código pasado como parámetro exista o no en la tabla
     * 
     * @param string $codUsuario
     * @return boolean 
     */
    public static function validarCodNoExiste($codUsuario) {
        $existe = false;
        $consulta = "SELECT * FROM T01_Usuarios1 WHERE T01_CodUsuario=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codUsuario]);
        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $existe = true;
        }
        return $existe;
    }

    /**
     * public static function buscaUsuariosPorDesc($descripcion)
     * 
     * Busca usuarios según la descripción
     * 
     * @param string $descripcion
     * @return array  Array de usuarios, que contiene arrays con información de cada usuario
     */
    public static function buscaUsuariosPorDesc($descripcion) {
        $aUsuarios = []; //Array que rec
        //Dependiendo del criterio de búsqueda crearemos un query u otro

        $consulta = "SELECT * FROM T01_Usuarios1 where T01_DescUsuario like (?)";

        $resConsulta = DBPDO::ejecutarConsulta($consulta, ["%$descripcion%"]);
        if ($resConsulta->rowCount()) { //Comprobamos si se han obtenido resultados en la consulta
            while ($resFetch = $resConsulta->fetchObject()) {
                $aUsuario['T01_CodUsuario'] = $resFetch->T01_CodUsuario; //Introducimos valores en el array
                $aUsuario['T01_Password'] = $resFetch->T01_Password;
                $aUsuario['T01_DescUsuario'] = $resFetch->T01_DescUsuario;
                $aUsuario['T01_NumAccesos'] = $resFetch->T01_NumAccesos;
                $aUsuario['T01_FechaHoraUltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
                $aUsuario['T01_Perfil'] = $resFetch->T01_Perfil;
                array_push($aUsuarios, $aUsuario); //Añadimos el array rellenado anteriormente al array de arrays
            }
        }
        return $aUsuarios;
    }

    /**
     * public static function buscaUsuariosPorCodigo($codigo)
     * 
     * Busca al usuario por código
     * 
     * @param string $codigo
     * @return array Array de 1 usuario, ya que no hay 2 usuarios con el msimo código
     */
    public static function buscaUsuariosPorCodigo($codigo) {
        $aUsuario = []; //Array que rec
        //Dependiendo del criterio de búsqueda crearemos un query u otro

        $consulta = "SELECT * FROM T01_Usuarios1 where T01_CodUsuario=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codigo]);

        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $resFetch = $resConsulta->fetchObject();
            $aUsuario['T01_CodUsuario'] = $resFetch->T01_CodUsuario; //Introducimos valores en el array
            $aUsuario['T01_Password'] = $resFetch->T01_Password;
            $aUsuario['T01_DescUsuario'] = $resFetch->T01_DescUsuario;
            $aUsuario['T01_NumAccesos'] = $resFetch->T01_NumAccesos;
            $aUsuario['T01_FechaHoraUltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
            $aUsuario['T01_Perfil'] = $resFetch->T01_Perfil;
        }
        return $aUsuario;
    }

    /**
     * public static function importarUsuario($CodUsuario,$Password,$DescUsuario,$NumAccesos,$FechaHoraUltimaConexion,$Perfil)
     * 
     * importa 1 Usuario con los parámetros pasados a la tabla, INSERT
     * 
     * @param string $CodUsuario
     * @param string $Password
     * @param string $DescUsuario
     * @param int $NumAccesos
     * @param string $FechaHoraUltimaConexion
     * @param string $Perfil
     * @return boolean
     */
    public static function importarUsuario($CodUsuario, $Password, $DescUsuario, $NumAccesos, $FechaHoraUltimaConexion, $Perfil) {
        $UsuarioImportado = false;
        $consulta = "INSERT INTO T01_Usuarios1 VALUES (?,?,?,?,?,?)";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodUsuario, $Password, $DescUsuario, $NumAccesos, $FechaHoraUltimaConexion, $Perfil]);
        if ($resConsulta->rowCount() != 0) {
            $UsuarioImportado = true;
        }
        return $UsuarioImportado;
    }


}

?>