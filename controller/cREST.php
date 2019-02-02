<?php

include 'model/REST.php';

if (isset($_REQUEST['Atras'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

$_SESSION['pagina'] = 'rest';
require_once $vistas['layout'];



echo "<h1>Datos de una provincia <a target='_blank' href='https://www.el-tiempo.net/api/json/v1/provincias'>(Servicio ajeno)</a></h1>";

if (isset($_REQUEST['Aceptar'])) {
    $codprov = $_REQUEST[CODPROV];

    if ($codprov == "selecciona") {
        echo "Debe de seleccionar una provincia para mostrar los datos.";
    } else {
        $aProvincia = Rest::obtenerDatosProvincia($codprov);
        echo "<b>Código de provincia: </b>" . $aProvincia['CODPROV'] . "<br>";
        echo "<b>Nombre de provincia: </b>" . $aProvincia['NOMBRE_PROVINCIA'] . "<br>";
        echo "<b>Comunidad autónoma: </b>" . $aProvincia['COMUNIDAD_CIUDAD_AUTONOMA'] . "<br>";
        echo "<b>Capital de provincia: </b>" . $aProvincia['CAPITAL_PROVINCIA'] . "<br><br>";
    }
}


echo "<h1>Datos de un departamento <a target='_blank' href='api/datosDepartamentos.json'>(Servicio propio)</a></h1>";

if (isset($_REQUEST['Aceptar2'])) {
    $coddept = $_REQUEST[CODDEPT];
    if ($coddept == "selecciona") {
        echo "Debe de seleccionar un departamento.";
    } else {
        $aDepartamento = Rest::obtenerDatosDepartamentos($coddept);
        echo "<b>Código de departamento: </b>" . $aDepartamento['CodDepartamento'] . "<br>";
        echo "<b>Nombre de departamento: </b>" . $aDepartamento['DescDepartamento'] . "<br>";
        echo "<b>Número de empleados: </b>" . $aDepartamento['NumEmple'] . "<br>";
        echo "<b>Presupuesto: </b>" . $aDepartamento['Presupuesto'] . "€<br>";
        echo "<b>Fecha de baja: </b>" . $aDepartamento['FechaBaja'] . "<br>";
    }
}
      

//*----------- ESTE CÓDIGO COMENTADO RECOJE DATOS DESDE UNA API REST JSON DEL SERVIDOR -------------*//
//
//            $aRespuesta = file_get_contents('http://localhost:3000/departamentos');
//
//            $aRespuesta = json_decode($aRespuesta, true);
//
//            echo "<h1>REST CONSUMO DE SERVICIO PROPIO</h1>";
//
//            foreach ($aRespuesta as $row) {//Recorro el array json por filas
//                $codigo = $row['CodDepartamento'];
//                $descripcion = $row['DescDepartamento'];
//                $fechaBaja = $row['FechaBaja'];
//
//                if ($fechaBaja == null) {
//                    $fechaBaja = "No está dado de baja";
//                }
//
//                echo "<b>Código: </b>" . $codigo . "<br>";
//                echo "<b>Descripción: </b>" . $descripcion . "<br>";
//                echo "<b>Fecha de baja: </b>" . $fechaBaja . "<br><br>";
//            }


