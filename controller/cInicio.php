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
   require_once 'view/layout.php';
}


