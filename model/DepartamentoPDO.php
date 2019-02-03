<?php

require_once "DBPDO.php";

class DepartamentoPDO {

  

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
        } else {
            $aDepartamentos[][] = "error"; //Si no hay devoluión de datos
        }
        return $aDepartamentos;
    }

    public static function altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio) {
        $DepartamentoCreado = false;
        date_default_timezone_set('Europe/Madrid');//Establezco la zona horaria de España
        $fecha = new DateTime();//Creo una nueva fecha actual
        $fecha->getTimestamp();//Recojo el timestamp de esa fecha
        $fecha = date("Y-m-d H:i:s");//Formateo el timestamp para que coincida con la tabla en la base de datos

        $consulta = "INSERT INTO T02_Departamentos1 VALUES (?,?,?,?,null)";
        $resConsulta = DBPDO::ejecutarConsulta($consulta, [$CodDepartamento, $DescDepartamento,$fecha, $VolumenNegocio]);
        if ($resConsulta->rowCount() != 0) {
            $DepartamentoCreado = true;
        }
        return $DepartamentoCreado;
    }

    public static function bajaFisicaDepartamento() {
        
    }

    public static function bajaLogicaDepartamento() {
        
    }

    public static function modificaDepartamento() {
        
    }

    public static function rehabilitaDepartamento() {
        
    }

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