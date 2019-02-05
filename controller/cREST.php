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




//--------------------------------ESTE CÓDIGO  RECOJE DATOS DE UN FICHERO JSON Y LOS MUESTRA---------------*//

echo "<h1>Datos de un departamento</h1>";

//Devuelve un select con los posibles departamentos a consultar


if (isset($_REQUEST['Aceptar2'])) {

    $siglas = $_REQUEST[siglas];

    if ($siglas == "selecciona") {
        echo "Seleccione un ciclo formativo para obtener sus asignaturas.";
    } else {
        echo "<a target='_blank' href='http://daw-used.sauces.local/DAW205/public_html/ProyectoDWES/proyectoAplicacion1819/api/ApiCiclos.php?ciclo=$siglas'>-> JSON ACTUAL <-</a><br><br>";
        $asignaturas = Rest::obtenerCF($siglas);//Recogo el array devuelto por la funcion
        echo "<b>Nombre del Ciclo: </b>" . $asignaturas['nombre'] . "<br>"; //Muestro los valores
        echo "<b>ASIGNATURA 1: </b>" . $asignaturas['asignatura1'] . "<br>"; 
        echo "<b>ASIGNATURA 2: </b>" . $asignaturas['asignatura2'] . "<br>";
        echo "<b>ASIGNATURA 3: </b>" . $asignaturas['asignatura3'] . "<br>";
        echo "<b>ASIGNATURA 4: </b>" . $asignaturas['asignatura4'] . "<br>";
    }
}


//---AQUÍ DEBO DE USAR cAPIREST.php


      

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


