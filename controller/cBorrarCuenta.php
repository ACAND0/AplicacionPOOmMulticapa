<?php

if (isset($_REQUEST['Cancelar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'miCuenta';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


if (isset($_REQUEST['Aceptar'])) {

    if ($_SESSION['usuario']->borrarUsuario()) {
        unset($_SESSION['usuario']);  //Vaciamos la variable SESSION del usuario
        session_destroy();//Destruimos la sesión
        header("Location: index.php");
    }else{
        echo "NO BORRA";
    }
}

