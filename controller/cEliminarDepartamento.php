<?php
/*
 * cBorrarCeunta
 * 
 * Este controlador se encarga de llamar a la función de borrarUsuario() si has pulsado aceptar.
 * Redirecciona al index si todo está correcto.
 */
if (isset($_REQUEST['Cancelar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoDepartamentos';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


if (isset($_REQUEST['Aceptar'])) {

    if ($_SESSION['usuario']->borrarUsuario()) {
        unset($_SESSION['usuario']);  //Vaciamos la variable SESSION del usuario
        session_destroy(); //Destruimos la sesión
        header("Location: index.php");
    }
} else {
    $_SESSION['pagina'] = 'borrarCuenta'; //Establecemos la página en el login
    require_once $vistas['layout']; //Y cargamos el layout
}

