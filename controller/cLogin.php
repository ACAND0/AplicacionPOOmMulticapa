<?php

if (isset($_REQUEST['Registrarse'])) {//Si se ha pulsado el botón aceptar

    $_SESSION['pagina'] = 'registro';
        //  $_SESSION['visitas'] = Usuario::registrarUltimaConexion($_REQUEST['CodUsuario']); 
    header("Location: index.php");
    exit;

}

$entradaOk = true; //Estado de la entrada
$Usuario = null; //Almacena un objeto usuario si se consigue instanciar
$aErrores = [
    CodUsuario => null,
    Password => null
];
$aRespuestas = [
    CodUsuario => null,
    Password => null
];

if (isset($_REQUEST['Aceptar'])) {//Si se ha pulsado el botón aceptar
    //Pasamos a validar los campos introducidos
    $aErrores[CodUsuario] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodUsuario'], 15, 3, 1);
    $aErrores[Password] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['Password'], 255, 4, 1);

    foreach ($aErrores as $campo => $error) {//Recorremos el array de errores en busca de alguno
        if ($error != null) {//Si hay errores
            $entradaOK = false; //La entradaOk pasa a ser falsa
            $_REQUEST[$campo] = ""; //El campo erróneo queda vacío
        }
    }
}

if (isset($_REQUEST['Aceptar']) && $entradaOk) {//Si la entrada es correcta
    $aRespuestas[CodUsuario] = $_REQUEST['CodUsuario'];
    $aRespuestas[Password] = $_REQUEST['Password'];

    $Usuario = Usuario::validarUsuario($aRespuestas[CodUsuario], $aRespuestas[Password]); //Compruebo que el usuario y password sean correctos

    if (is_null($Usuario)) {//Si no existe un usaurio con esas credenciales
        $aErrores[Password] = $aErrores[Password] . "Usuario/Contraseña incorrectos";
        $_SESSION['pagina'] = 'login'; //Establecemos la página en el login
        require_once $vistas['layout']; //Y cargamos el layout
    } else {//Si existe un usaurio con esas credenciales
        $_SESSION['usuario'] = $Usuario; //Cargamos en la sesión usuario el Usuario creado en la validación
        $_SESSION['pagina'] = 'inicio';
        //  $_SESSION['visitas'] = Usuario::registrarUltimaConexion($_REQUEST['CodUsuario']); 
        header("Location: index.php");
        exit;
    }
} else {
    $_SESSION['pagina'] = 'login'; //Establecemos la página en el login
    require_once $vistas['layout']; //Y cargamos el layout
}


