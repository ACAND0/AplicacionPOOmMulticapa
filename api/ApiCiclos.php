<?php

$siglas = $_GET[ciclo];
switch ($siglas) {//Dependiendo de las siglas ofrecidas por el usuario introduzco unos valores u otros al array
    case "DAW1":
        $aCiclo['nombre'] = "1º de Desarrollo de Aplicaciones Web";
        $aCiclo['asignatura1'] = "Programacion";
        $aCiclo['asignatura2'] = "Bases de datos";
        $aCiclo['asignatura3'] = "Lenguaje de Marcas";
        $aCiclo['asignatura4'] = "Entorno de desarrollo";
        break;
    case "DAW2":
        $aCiclo['nombre'] = "2º de Desarrollo de Aplicaciones Web";
        $aCiclo['asignatura1'] = "Desarrollo Web Entonro Cliente";
        $aCiclo['asignatura2'] = "Desarrollo Web Entonro Servidor";
        $aCiclo['asignatura3'] = "Diseño de interfaces Web";
        $aCiclo['asignatura4'] = "Desarrollo de Aplicaciones Web";
        break;
    case "ASIR1":
        $aCiclo['nombre'] = "1º de Administración de Sistemas Informáticos en Red";
        $aCiclo['asignatura1'] = "Planificación y Administración de Redes";
        $aCiclo['asignatura2'] = "Implantación de Sistemas Operativos";
        $aCiclo['asignatura3'] = "Fundamentos de Hardware";
        $aCiclo['asignatura4'] = "Gestión de Bases de Datos";
        break;
    case "ASIR2":
        $aCiclo['nombre'] = "2º de Administración de Sistemas Informáticos en Red";
        $aCiclo['asignatura1'] = "Administración de Sistemas Operativos";
        $aCiclo['asignatura2'] = "Servicios de Red e Internet";
        $aCiclo['asignatura3'] = "Implantación de Aplicaciones web";
        $aCiclo['asignatura4'] = "Administración de Sistemas Gestores de bases de datos";
        break;
    default:
        $aCiclo['ERROR'] = "NO SE HA ENCONTRADO UN CICLO FORMATIVO CON ESAS SIGLAS";//Este default se muestra en caso de que ninguno d elos anteriores casos se haya dado

}

header('Content-type: application/json');//Establecemos la cabecera del tipo de contenido que vamos a mostrar, JSON
//echo json_encode( $aCiclo );
echo json_encode($aCiclo, JSON_PRETTY_PRINT);//Mostramos el JSON con codificado

?>