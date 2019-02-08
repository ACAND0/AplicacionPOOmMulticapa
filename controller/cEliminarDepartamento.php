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
    $Departamento = Departamento::buscaDepartamentosPorCodigo($_SESSION['CodigoDepartamento']);
    
    if ($Departamento->bajaFisicaDepartamento()) {
        $_SESSION['pagina'] = 'mtoDepartamentos';  
        header("Location: index.php");
        exit;
    }
} else {
    $_SESSION['pagina'] = 'eliminarDepartamento'; //Establecemos la página en el login
    require_once $vistas['layout']; //Y cargamos el layout
}

