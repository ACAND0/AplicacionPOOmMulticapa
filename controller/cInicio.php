<?php


if(isset($_REQUEST['Salir'])){//Si hemos pulsado salir
        unset($_SESSION['usuario']);  //Vaciamos la variable SESSION del usuario
        session_destroy();//Destruimos la sesión
        header("Location: index.php"); //Y redireccionamos al index
}

if(isset($_REQUEST['EditarPerfil'])){//Si hemos pulsado salir
        $_SESSION['pagina']='miCuenta';  //Vaciamos la variable SESSION del usuario
        header("Location: index.php"); //Y redireccionamos al index
}

if (!isset($_SESSION['usuario'])) { //Si no existe un usaurio logueado
    header("Location: index.php"); //Redireccionamos al index
} else{//Si existe, cargamos el layout
    setlocale(LC_TIME, 'es_ES.UTF-8'); //Selecciona el idioma. 
    date_default_timezone_set('Europe/Madrid');//Zona horaria 
    $CodUsuario = $_SESSION['usuario']->getCodUsuario();
    $NumAccesos = $_SESSION['usuario']->getNumAccesos();
    $FechaHoraUltimaConexion = strftime("%A %d de %B del %Y a las %H:%M:%S",$_SESSION['usuario']->getFechaHoraUltimaConexion());
    $Perfil = $_SESSION['usuario']->getPerfil();

   require_once 'view/layout.php';
}


