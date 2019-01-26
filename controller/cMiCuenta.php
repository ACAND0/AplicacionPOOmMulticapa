<?php

$entradaOK = true;

//Creo el array con las respuestas
$aRespuestas = [
    DescUsuario => null
];
//Creo el array con los errores
$aErrores = [
    DescUsuario => null
];

if (isset($_REQUEST['Cancelar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['CambiarContraseña'])) {//Si hemos pulsado CambiarContraseña
    $_SESSION['pagina'] = 'inicio';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;

}

if (isset($_REQUEST['BorrarCuenta'])) {//Si hemos pulsado EliminarPerfil
    $_SESSION['pagina'] = 'borrarCuenta';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


if (!isset($_SESSION['usuario'])) { //Si no existe un usaurio logueado
    header("Location: index.php"); //Redireccionamos al index
     exit;
} else {//Si existe, cargamos el layout
    require_once 'view/layout.php';
}

if (isset($_REQUEST['Aceptar'])) {
    //Valido las entradas
    $aErrores[DescUsuario] = validacionFormularios::comprobarAlfanumerico($_REQUEST['DescUsuario'], 255, 5, 1);

    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_POST[$campo] = "";
        }
    }
}

if (isset($_REQUEST['Aceptar']) && $entradaOK) {

    $aRespuestas[DescUsuario] = $_REQUEST['DescUsuario']; //Recojo la nueva descripcion si ha cambiado, sino es la misma
    
    $modificado = $_SESSION['usuario']->modificarUsuario($aRespuestas[DescUsuario]);

    if ($modificado) {
        $_SESSION['pagina'] = 'inicio';
        header("Location: index.php");
    }else{
        echo "No has modificado nada, si no deseas modificar nada, pulsa Cancelar.";
    }
}
