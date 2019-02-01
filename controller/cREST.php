<?php
if (isset($_REQUEST['Atras'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


$_SESSION['pagina'] = 'rest';
require_once $vistas['layout'];

$error = null;
$entradaOK = true;

// https://www.el-tiempo.net/api/json/v1/provincias/[CODPROV]/municipios/[ID]/weather

//if (isset($_REQUEST['Aceptar'])) {//Si se ha pulsado el botón aceptar
//    //Pasamos a validar los campos introducidos
//    $error = validacionFormularios::comprobarAlfabetico($_REQUEST['nombreMunicipio'], 20, 3, 1);
//    if ($error != null) {//Si hay errores
//        $entradaOK = false; //La entradaOk pasa a ser falsa
//        $_REQUEST["nombreMunicipio"] = ""; //El campo erróneo queda vacío
//    }
//}


if (isset($_REQUEST['Aceptar']) && $entradaOK) {
    echo "<h1>REST CONSUMO DE SERVICIO AEMET</h1>";
    //Api https://www.el-tiempo.net/api
//    $aMunicipio = file_get_contents('https://www.el-tiempo.net/api/json/v1/municipios');
//
//    $aMunicipio = json_decode($aMunicipio, true);
//    foreach ($aMunicipio as $row) {//Recorro el array json por filas
//        $nombre = $row['NOMBRE'];
//        $nombreMunicipio = $_REQUEST['nombreMunicipio'];
//
//        if ($nombre == $nombreMunicipio) {//49 es el código de benavente
//            $nombre_provincia = $row['NOMBRE_PROVINCIA'];
//            $poblacion = $row['POBLACION_MUNI'];
//            $superficie = $row['SUPERFICIE'];
//            $altitud = $row['ALTITUD'];
//
//            echo "<b>Provincia: </b>" . $nombre_provincia . "<br>";
//            echo "<b>Población: </b>" . $nombre . "<br>";
//            echo "<b>Habitantes: </b>" . $poblacion . "<br><br>";
//            echo "<b>Superficie(m2): </b>" . $superficie . "<br><br>";
//            echo "<b>Altitud: </b>" . $altitud . "<br><br>";
//        }
//    }
    
        $provincia = file_get_contents('https://www.el-tiempo.net/api/json/v1/provincias/'.$_REQUEST[CODPROV]);

    $provincia = json_decode($provincia, true);
    
    foreach ($provincia as $row) {
            $nombre_provincia = $row['NOMBRE_PROVINCIA'];
            $comunidad_autonoma = $row['COMUNIDAD_CIUDAD_AUTONOMA'];
            $capital_provincia = $row['CAPITAL_PROVINCIA'];

            echo "<b>Nombre de provincia: </b>" . $nombre_provincia . "<br>";
            echo "<b>Comunidad autónoma: </b>" . $comunidad_autonoma . "<br>";
            echo "<b>Capital de provincia: </b>" . $capital_provincia . "<br><br>";
    }
    }










//*-----------OPERATIVO SÓLO EN EL SERVIDOR-------------*//
$aRespuesta = file_get_contents('http://localhost:3000/departamentos');

$aRespuesta = json_decode($aRespuesta, true);

echo "<h1>REST CONSUMO DE SERVICIO PROPIO</h1>";

foreach ($aRespuesta as $row) {//Recorro el array json por filas
    $codigo = $row['CodDepartamento'];
    $descripcion = $row['DescDepartamento'];
    $fechaBaja = $row['FechaBaja'];

    if ($fechaBaja == null) {
        $fechaBaja = "No está dado de baja";
    }

    echo "<b>Código: </b>" . $codigo . "<br>";
    echo "<b>Descripción: </b>" . $descripcion . "<br>";
    echo "<b>Fecha de baja: </b>" . $fechaBaja . "<br><br>";
}


