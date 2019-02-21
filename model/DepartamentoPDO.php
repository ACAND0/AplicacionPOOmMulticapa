<?php

/**
 * Archivo DepartamentoPDO.php
 * 
 * Este archivo contiene una clase con varias funciones, las cuales manejan las operaciones
 * relacionadas con los objetos Departamento en nuestra aplicación, es utilizada por la clase Departamento
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package model
 */
require_once "DBPDO.php";

/**
 *  Class UsuarioPDO
 * 
 * Contiene funciones que operan con objetos Departamento directamente ejecutando querys con la clase
 * DBPDO 
 * 
 * @author Adrián Cando Oviedo
 * @modifiedDate 11/02/2019
 * @version 2.6
 * 
 */
class DepartamentoPDO {

    /**
     *  static function buscaDepartamentosPorCodigo($codigo)
     * 
     * Busca y recopila la información de la abse de datos de un departamento con el código pasado como parámetro
     * 
     * @param string $codigo
     * @return array Array con los datos de un departamento
     */
    public static function buscaDepartamentosPorCodigo($codigo) {
        $aDepartamento = []; //Array que rec
        //Dependiendo del criterio de búsqueda crearemos un query u otro

        $consulta = "SELECT * FROM T02_Departamentos1 where CodDepartamento=?";

        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codigo]);
        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $resFetch = $resConsulta->fetchObject();
            $aDepartamento['CodDepartamento'] = $resFetch->CodDepartamento; //Introducimos valores en el array
            $aDepartamento['DescDepartamento'] = $resFetch->DescDepartamento;
            $aDepartamento['FechaCreacionDepartamento'] = $resFetch->FechaCreacionDepartamento;
            $aDepartamento['VolumenDeNegocio'] = $resFetch->VolumenDeNegocio;
            $aDepartamento['FechaBajaDepartamento'] = $resFetch->FechaBajaDepartamento;
        }
        return $aDepartamento;
    }

    /**
     * static function buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda)
     * 
     * Busca los departamentos que coincidan con la descripción y el criterio de búsqueda
     * pasados como parámetros
     * 
     * @param string $descripcion 
     * @param string $criterioBusqueda
     * @param int $primerRegistro
     * @param int $registrosPorPagina
     * @return array Array de objetos Departamento
     */
    

    public static function buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda, $primerRegistro, $registrosPorPagina) {
        $aDepartamentos = []; //Array que rec
        //Dependiendo del criterio de búsqueda crearemos un query u otro

        $consulta = "SELECT * FROM T02_Departamentos1 where DescDepartamento like (?)";

        if ($criterioBusqueda == 'Baja') {
            $consulta = "SELECT * FROM T02_Departamentos1 where DescDepartamento like (?) AND FechaBajaDepartamento is not null";
        }
        if ($criterioBusqueda == 'Alta') {
            $consulta = "SELECT * FROM T02_Departamentos1 where DescDepartamento like (?) AND FechaBajaDepartamento is null";
        }



        $resConsulta = DBPDO::ejecutarConsulta($consulta . " limit $primerRegistro,$registrosPorPagina", ["%$descripcion%"]); //Concateno a la consulta el limit con el comienzo del registro y el numero de registros a contar

        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            while ($resFetch = $resConsulta->fetchObject()) {//Minetras podamos instanciar objetos
                $aDepartamento['CodDepartamento'] = $resFetch->CodDepartamento; //Introducimos valores en el array
                $aDepartamento['DescDepartamento'] = $resFetch->DescDepartamento;
                $aDepartamento['FechaCreacionDepartamento'] = $resFetch->FechaCreacionDepartamento;
                $aDepartamento['VolumenDeNegocio'] = $resFetch->VolumenDeNegocio;
                $aDepartamento['FechaBajaDepartamento'] = $resFetch->FechaBajaDepartamento;
                array_push($aDepartamentos, $aDepartamento); //Añadimos el array rellenado anteriormente al array de arrays
            }
        }
        return $aDepartamentos;
    }
/**
 * public static function contarDepartamentosPorDesc($descripcion, $criterioBusqueda)
 * 
 * Función que dependiendo la descripción y el criterio de búsqueda que se pase, se cuentan los departamentos con estas características
 * 
 * @param string $descripcion
 * @param string $criterioBusqueda
 * @return int Entero con el número de departamentos encontrados con esa descripción y criterio de búsqueda
 */
    public static function contarDepartamentosPorDesc($descripcion, $criterioBusqueda) {
        $consulta = "SELECT COUNT(*) FROM T02_Departamentos1 where DescDepartamento like (?)";

        if ($criterioBusqueda == 'Baja') {
            $consulta = "SELECT COUNT(*) FROM  T02_Departamentos1 where DescDepartamento like (?) AND FechaBajaDepartamento is not null";
        }
        if ($criterioBusqueda == 'Alta') {
            $consulta = "SELECT COUNT(*) FROM T02_Departamentos1 where DescDepartamento like (?) AND FechaBajaDepartamento is null";
        }

        $resConsulta = DBPDO::ejecutarConsulta($consulta, ["%$descripcion%"]); //Concateno a la consulta el limit con el comienzo del registro y el numero de registros a contar

        if ($resConsulta->rowCount()) { //Comprobamos si se han obtenido resultados en la consulta.
            $numRegistros = $resConsulta->fetchColumn(0);
        }
        return $numRegistros;
    }

    /**
     * static function altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio)
     * 
     * 
     * 
     * @param string $CodDepartamento
     * @param string $DescDepartamento 
     * @param int $VolumenNegocio
     * @return boolean
     */
    public static function altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio) {
        $DepartamentoCreado = false;

//          El código de debajo se utiliza si deseamos añadir la fecha mediante timestamp desde PHP
//          
//        date_default_timezone_set('Europe/Madrid'); //Establezco la zona horaria de España
//        $fechaCreacion = new DateTime(); //Creo una nueva fecha actual
//        $fechaCreacion->getTimestamp(); //Recojo el timestamp de esa fecha
//        $fechaCreacion = date("Y-m-d H:i:s"); //Formateo el timestamp para que coincida con la tabla en la base de datos

        $consulta = "INSERT INTO T02_Departamentos1 VALUES (?,?,CURRENT_TIMESTAMP,?,null)";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [strtoupper($CodDepartamento), $DescDepartamento, $VolumenNegocio]);
        if ($resConsulta->rowCount() != 0) {
            $DepartamentoCreado = true;
        }
        return $DepartamentoCreado;
    }

    /**
     *  static function bajaFisicaDepartamento($codDepartamento)
     * 
     * Elimina el departamento que contenga el código paasado como parámetro
     * 
     * @param string $codDepartamento
     * @return boolean
     */
    public static function bajaFisicaDepartamento($codDepartamento) {
        $eliminado = false;
        $consulta = "DELETE FROM T02_Departamentos1 WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codDepartamento]); //Ejecutamos la consulta
        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $eliminado = true;
        }
        return $eliminado;
    }

    /**
     *  static function bajaLogicaDepartamento($CodDepartamento)
     * 
     * Establece una fecha de baja(la actual) a la columna FechaBajaDepartamento del Departamento que contenga
     * el código pasado como parámetro
     * 
     * @param string $CodDepartamento
     * @return boolean
     */
    public static function bajaLogicaDepartamento($CodDepartamento) {
        $dadoDeBaja = false;
        $consulta = "UPDATE T02_Departamentos1 SET FechaBajaDepartamento=CURRENT_TIMESTAMP WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $dadoDeBaja = true;
        }
        return $dadoDeBaja;
    }

    /**
     * static function modificaDepartamento($CodDepartamento, $VolumenDeNegocio, $DescDepartamento)
     * 
     * Modifica un departamento en la base de datos
     * 
     * @param string $CodDepartamento
     * @param int $VolumenDeNegocio 
     * @param string $DescDepartamento
     * @return boolean
     */
    public static function modificaDepartamento($CodDepartamento, $VolumenDeNegocio, $DescDepartamento) {
        $modificado = false;
        $consulta = "UPDATE T02_Departamentos1 SET DescDepartamento=?, VolumenDeNegocio=? WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$DescDepartamento, $VolumenDeNegocio, $CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $modificado = true;
        }
        return $modificado;
    }

    /**
     *  static function rehabilitaDepartamento($CodDepartamento)
     * 
     * Establece la fecha de baja a null del departamento que contenga
     * el código pasado como parámetro
     * 
     * @param string $CodDepartamento
     * @return boolean
     */
    public static function rehabilitaDepartamento($CodDepartamento) {
        $rehabilitado = false;
        $consulta = "UPDATE T02_Departamentos1 SET FechaBajaDepartamento=null WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $rehabilitado = true;
        }
        return $rehabilitado;
    }

    /**
     *  static function validaCodNoExiste($CodDepartamento)
     * 
     * Valida si existe un departamento  que contenga
     * el código pasado como parámetro
     * 
     * @param string $CodDepartamento
     * @return boolean
     */
    public static function validaCodNoExiste($CodDepartamento) {
        $existe = false;
        $consulta = "SELECT * FROM T02_Departamentos1 where CodDepartamento = ?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $existe = true;
        }
        return $existe;
    }

    /**
     *  
     * static function importarDepartamento($CodDepartamento, $DescDepartamento, $FechaCreacionDepartamento, $VolumenNegocio, $FechaBajaDepartamento)ype $VolumenNegocio
     * 
     * importa 1 Departamento con los parámetros pasados a la tabla, INSERT
     * 
     * @param string $CodDepartamento
     * @param string $DescDepartamento
     * @param string $FechaCreacionDepartamento
     * @param int $VolumenNegocio
     * @param string $FechaBajaDepartamento
     * @return boolean
     */
    public static function importarDepartamento($CodDepartamento, $DescDepartamento, $FechaCreacionDepartamento, $VolumenNegocio, $FechaBajaDepartamento) {
        $DepartamentoImportado = false;
        $consulta = "INSERT INTO T02_Departamentos1 VALUES (?,?,?,?,?)";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [strtoupper($CodDepartamento), $DescDepartamento, $FechaCreacionDepartamento, $VolumenNegocio, $FechaBajaDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $DepartamentoImportado = true;
        }
        return $DepartamentoImportado;
    }

}

?>