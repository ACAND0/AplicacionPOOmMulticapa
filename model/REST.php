<?php

require_once 'Departamento.php';
//require_once 'api/ApiDepartamento.php';

Class Rest {

    public static function obtenerDatosProvincia($codprov) {
        $aProv = []; //Almacenaré los datos de la provincia
        $provincia = file_get_contents('https://www.el-tiempo.net/api/json/v1/provincias/' . $codprov);
        $provincia = json_decode($provincia, true);

        foreach ($provincia as $row) {
            $aProv['CODPROV'] = $row['CODPROV'];
            $aProv['NOMBRE_PROVINCIA'] = $row['NOMBRE_PROVINCIA'];
            $aProv['COMUNIDAD_CIUDAD_AUTONOMA'] = $row['COMUNIDAD_CIUDAD_AUTONOMA'];
            $aProv['CAPITAL_PROVINCIA'] = $row['CAPITAL_PROVINCIA'];
        }
        return $aProv;
    }

    public static function obtenerCF($siglas) { 
        $asignaturas = []; //Almacenaré los datos de los ciclos
        $Ciclo = file_get_contents('http://daw-used.sauces.local/DAW205/public_html/ProyectoDWES/proyectoAplicacion1819/api/ApiCiclos.php?ciclo='.$siglas);//Llamo a la api con las siglas del ciclo indicadas por el usuario
        var_dump($Ciclo);//Punto en el que muestro el file_get_contents
        $aCiclo = json_decode($Ciclo);//Decodifico el fichero JSON

        foreach ($aCiclo as $row => $valor) {
            $asignaturas[$row] = $valor;//Creo un array con las mismas claves y valores que el devuelto por la api
        }
        
        return $asignaturas;//Devuelvo el array
    }

}

//          ESTE CASO SERÍA SI LO REALIZO CON UN ARCHIVO JSON, NO ES UN SERVICIO COMO TAL
//        
//        $departamentos = []; //Almacenaré los datos de la provincia
//        $departamentos = file_get_contents('api/datosDepartamentos.json');
//        $departamentos = json_decode($departamentos, true);
//
//        foreach ($departamentos as $row) {//Recorro el array json por filas
//            if ($coddept == $row['CodDepartamento']) {
//                $departamentos['CodDepartamento'] = $row['CodDepartamento'];
//                $departamentos['DescDepartamento'] = $row['DescDepartamento'];
//                $departamentos['NumEmple'] = $row['NumEmple'];
//                $departamentos['Presupuesto'] = $row['Presupuesto'];
//
//                if ($row['FechaBaja'] == null) {
//                    $departamentos['FechaBaja'] = "No está dado de baja";
//                } else {
//                    $departamentos['FechaBaja'] = $row['FechaBaja'];
//                }
//            }
//        }
//        return $departamentos;
    

    /* https://www.el-tiempo.net/api/json/v1/provincias/49/municipios/49021/weather JODIDAMENTE IMPOSIBLE DE HACER 
      public static function obtenerClimaMunicipio($codmunicipio) {
      $aMun = [];//Almacenaré los datos climatológicos del municipio

      $municipio = file_get_contents('https://www.el-tiempo.net/api/json/v1/provincias/49/'. $codmunicipio . '/weather');
      $municipio = json_decode($provincia, true);

      foreach ($municipio as $row) {
      $aProv['CODPROV'] = $row['CODPROV'];
      $aProv['NOMBRE_PROVINCIA'] = $row['NOMBRE_PROVINCIA'];
      $aProv['COMUNIDAD_CIUDAD_AUTONOMA'] = $row['COMUNIDAD_CIUDAD_AUTONOMA'];
      $aProv['CAPITAL_PROVINCIA'] = $row['CAPITAL_PROVINCIA'];
      }
      return $aMun;
      }
     */

