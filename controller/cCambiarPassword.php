<?php
/**
 * Archivo cCambiarPassword.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */

if (isset($_REQUEST['Cancelar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'miCuenta';  //V
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

$entradaOK = true;
$aRespuestas = [
    PasswordNueva => null,
];

$aErrores = [
    PasswordActual => null,
    PasswordNueva => null,
    ConfirmarPasswordNueva => null
];

if (isset($_REQUEST['Aceptar'])) {
    $aErrores[PasswordNueva] = validacionFormularios::validarPassword($_REQUEST['PasswordNueva'], 1, 5);
    $aErrores[ConfirmarPasswordNueva] = validacionFormularios::validarPassword($_REQUEST['ConfirmarPasswordNueva'], 1, 5);
//Comprobar que la contraseña introducida es la correcta
    if ($_REQUEST[PasswordActual] != $_SESSION['usuario']->getPassword()) {
        $aErrores[PasswordActual] = "La contraseña introducida no coincide con la actual";
    }else{
        $aRespuestas[PasswordActual]=$_REQUEST[PasswordActual];
    }
    

    if ($_REQUEST[PasswordNueva] != $_REQUEST[ConfirmarPasswordNueva]) {
        $aErrores[PasswordNueva] = "Las contraseñas no coinciden";
        $aErrores[ConfirmarPasswordNueva] = "Las contraseñas no coinciden";
    }

    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }
}

if (isset($_REQUEST['Aceptar']) && $entradaOK) {
    $aRespuestas[PasswordNueva] = $_REQUEST['PasswordNueva'];
    $passwordCambiada = $_SESSION['usuario']->cambiarPassword($aRespuestas[PasswordNueva]);
    if ($passwordCambiada) {
        $_SESSION['pagina'] = 'miCuenta';
        header("Location: index.php"); //Y redireccionamos al index
        exit;
    } else {
        echo "NADA";
    }
} else {
    $_SESSION['pagina'] = 'cambiarPassword'; //Establecemos la página en el login
    require_once $vistas['layout']; //Y cargamos el layout    
}


    
    
    
