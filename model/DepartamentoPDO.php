<?php

require_once "DBPDO.php";

class DepartamentoPDO {

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

    public static function buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda) {
        $aDepartamentos = []; //Array que rec
        //Dependiendo del criterio de búsqueda crearemos un query u otro

        $consulta = "SELECT * FROM T02_Departamentos1 where DescDepartamento like (?)";

        if ($criterioBusqueda == 'Baja') {
            $consulta = "SELECT * FROM T02_Departamentos1 where DescDepartamento like (?) AND FechaBajaDepartamento is not null";
        }
        if ($criterioBusqueda == 'Alta') {
            $consulta = "SELECT * FROM T02_Departamentos1 where DescDepartamento like (?) AND FechaBajaDepartamento is null";
        }

        $resConsulta = DBPDO::ejecutarConsulta($consulta, ["%$descripcion%"]);
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

    public static function bajaFisicaDepartamento($codDepartamento) {
        $eliminado = false;
        $consulta = "DELETE FROM T02_Departamentos1 WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$codDepartamento]); //Ejecutamos la consulta
        if ($resConsulta->rowCount() != 0) { //Comprobamos si se han obtenido resultados en la consulta
            $eliminado = true;
        }
        return $eliminado;
    }

    public static function bajaLogicaDepartamento($CodDepartamento) {
        $dadoDeBaja = false;
        $consulta = "UPDATE T02_Departamentos1 SET FechaBajaDepartamento=CURRENT_TIMESTAMP WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $dadoDeBaja = true;
        }
        return $dadoDeBaja;
    }

    public static function modificaDepartamento($CodDepartamento, $VolumenDeNegocio, $DescDepartamento) {
        $modificado = false;
        $consulta = "UPDATE T02_Departamentos1 SET DescDepartamento=?, VolumenDeNegocio=? WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$DescDepartamento, $VolumenDeNegocio, $CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $modificado = true;
        }
        return $modificado;
    }

    public static function rehabilitaDepartamento($CodDepartamento) {
        $rehabilitado = false;
        $consulta = "UPDATE T02_Departamentos1 SET FechaBajaDepartamento=null WHERE CodDepartamento=?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $rehabilitado = true;
        }
        return $rehabilitado;    }

    public static function validaCodNoExiste($CodDepartamento) {
        $existe = false;
        $consulta = "SELECT * FROM T02_Departamentos1 where CodDepartamento = ?";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodDepartamento]);
        if ($resConsulta->rowCount() != 0) {
            $existe = true;
        }
        return $existe;
    }

}

?>