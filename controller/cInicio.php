<?php
/*
 * cInicio
 * 
 * Controlador del inicio, se encarga de comprobar que botones has podido pulsar y 
 * redireccionar y de cargar en variables los datos que mostraremos posterirmente en la vista
 * eliminando así la conexión de la vista con el modelo.
 */

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    unset($_SESSION['usuario']);  //Vaciamos la variable SESSION del usuario
    session_destroy(); //Destruimos la sesión
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['EditarPerfil'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'miCuenta';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['MantenimientoDepartamentos'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['SOAP'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    
    //$_SESSION['pagina'] = 'soap';
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['REST'])) {//Si hemos pulsado salir
 //   $_SESSION['paginaanterior'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'rest';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


if (!isset($_SESSION['usuario'])) { //Si no existe un usaurio logueado
    header("Location: index.php"); //Redireccionamos al index
} else {//Si existe, cargamos el layout
    setlocale(LC_TIME, 'es_ES.UTF-8'); //Selecciona el idioma. 
    date_default_timezone_set('Europe/Madrid'); //Zona horaria 
    $CodUsuario = $_SESSION['usuario']->getCodUsuario();
    $NumAccesos = $_SESSION['usuario']->getNumAccesos();
    $FechaHoraUltimaConexion = strftime("%A %d de %B del %Y a las %H:%M:%S", $_SESSION['usuario']->getFechaHoraUltimaConexion());
    $Perfil = $_SESSION['usuario']->getPerfil();
    
    $_SESSION['pagina'] = 'inicio';
    require_once $vistas['layout'];
}


