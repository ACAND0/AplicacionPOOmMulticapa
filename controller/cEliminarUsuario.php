<?php
/**
 * Archivo cEliminarUsuario.php
  * 
 * Este controlador se encarga de llamar a la función de borrarUsuario() si has pulsado aceptar.
 * Redirecciona al index si todo está correcto.
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */

 
if (isset($_REQUEST['Cancelar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoUsuarios';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


if (isset($_REQUEST['Aceptar'])) {
    $Usuario = Usuario::buscaUsuariosPorCodigo($_SESSION['CodigoUsuario']);
    
    if ($Usuario->borrarUsuario()) {
        $_SESSION['pagina'] = 'mtoUsuarios';  
        header("Location: index.php");
        exit;
    }
} else {
    $_SESSION['pagina'] = 'eliminarUsuario'; //Establecemos la página en el login
    require_once $vistas['layout']; //Y cargamos el layout
}

