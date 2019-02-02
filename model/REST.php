<?php

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

    public static function obtenerDatosDepartamentos($coddept) {
        $aDept = []; //Almacenaré los datos de la provincia
        $departamentos = file_get_contents('api/datosDepartamentos.json');
        $departamentos = json_decode($departamentos, true);

        foreach ($departamentos as $row) {//Recorro el array json por filas
            if ($coddept == $row['CodDepartamento']) {
                $aDept['CodDepartamento'] = $row['CodDepartamento'];
                $aDept['DescDepartamento'] = $row['DescDepartamento'];
                $aDept['NumEmple'] = $row['NumEmple'];
                $aDept['Presupuesto'] = $row['Presupuesto'];

                if ($row['FechaBaja'] == null) {
                    $aDept['FechaBaja'] = "No está dado de baja";
                } else {
                    $aDept['FechaBaja'] = $row['FechaBaja'];
                }
            }
        }
        return $aDept;
    }

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
}
