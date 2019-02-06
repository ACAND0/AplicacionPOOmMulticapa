<?php

require_once 'model/REST.php';


if (isset($_REQUEST['Atras'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

/////////////////////////////////////////////////----PROVINCIAS

if (isset($_REQUEST['Aceptar'])) {
    $codprov = $_REQUEST[CODPROV];
    //Asigno un link con el enlace al JSON de AEMET actual para mostrarlo en la vista
    if ($codprov == "selecciona") {
        $error = "Debe de seleccionar una provincia para mostrar los datos.";
    } else {
//        $linkJSONAEMET = "<a target='_blank' href='https://www.el-tiempo.net/api/json/v1/provincias/$codprov'>-> JSON ACTUAL <-</a><br><br>";
        $linkJSONAEMET = "<a target='_blank' href='https://www.el-tiempo.net/api/json/v1/provincias/$codprov'>-> JSON ACTUAL <-</a><br><br>";
        $aProvincia = Rest::obtenerDatosProvincia($codprov);
    }
}


/////////////////////////////////////////////////----CICLOS

if (isset($_REQUEST['Aceptar2'])) {
    $siglas = $_REQUEST[siglas];
    if ($siglas == "selecciona") {
        $error = "Seleccione un ciclo formativo para obtener sus asignaturas.";
    } else {
        //Asigno un link con el enlace al JSON del Ciclo actual para mostrarlo en la vista
//        $linkJSONCiclos = "<a target='_blank' href='http://192.168.1.105/ProyectoDWES/proyectoAplicacion1819/api/ApiCiclos.php?ciclo=$siglas'>-> JSON ACTUAL <-</a><br><br>";
        $linkJSONCiclos = "<a target='_blank' href='http://192.168.20.19/DAW205/public_html/ProyectoDWES/proyectoAplicacion1819/api/ApiCiclos.php?ciclo=$siglas'>-> JSON ACTUAL <-</a><br><br>";
        $asignaturas = Rest::obtenerCF($siglas); //Recogo el array devuelto por la funcion
    }
}

/////////////////////////////////////////////////----DEPARTAMENTOS

if (isset($_REQUEST['Aceptar3'])) {
    $codigo = $_REQUEST[codigo];
    if ($codigo == "selecciona") {
        $error = "Seleccione un código para obtener sus datos.";
    } else {
        //Asigno un link con el enlace al JSON del Ciclo actual para mostrarlo en la vista
        $linkJSONDepartamentos = "<a target='_blank' href='http://192.168.20.19/DAW205/public_html/ProyectoDWES/proyectoAplicacion1819/api/ApiDepartamentos.php?codigo=$codigo'>-> JSON ACTUAL <-</a><br><br>";
        $departamento = Rest::obtenerDtosDepartamento($codigo); //Recogo el array devuelto por la funcion
    }
}













$_SESSION['pagina'] = 'rest';
require_once $vistas['layout'];




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


