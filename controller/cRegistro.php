<?php

if (isset($_REQUEST['Cancelar'])) {//Si se ha pulsado el botón cancelar
    $_SESSION['pagina'] = 'login';
    header("Location: index.php");
    exit;
}

$entradaOK = true;
//Creo el array con las respuestas
$aRespuestas = [
    CodUsuario => null,
    DescUsuario => null,
    Password => null
];
//Creo el array con los errores
$aErrores = [
    CodUsuario => null,
    DescUsuario => null,
    Password => null
];


if (isset($_REQUEST['Aceptar'])) {
    //Valido las entradas
    $aErrores[CodUsuario] = validacionFormularios::comprobarAlfanumerico($_REQUEST['CodUsuario'], 15, 3, 1);
    $aErrores[DescUsuario] = validacionFormularios::comprobarAlfanumerico($_REQUEST['DescUsuario'], 255, 5, 1);
    $aErrores[Password] = validacionFormularios::validarPassword($_REQUEST['Password'], 1, 5);



    if (Usuario::validarCodNoExiste($_REQUEST['CodUsuario'])) {
        $aErrores[CodUsuario] = "El código de usuario ya existe, seleccione otro por favor.";
    }

    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }
}

if (isset($_REQUEST['Aceptar']) && $entradaOK) {

    $aRespuestas[CodUsuario] = $_REQUEST['CodUsuario'];
    $aRespuestas[DescUsuario] = $_REQUEST['DescUsuario'];
    $aRespuestas[Password] = $_REQUEST['Password'];

    $Usuario = Usuario::altaUsuario($aRespuestas[CodUsuario], $aRespuestas[Password], $aRespuestas[DescUsuario]);
    $Usuario->registrarUltimaConexion($aRespuestas[CodUsuario]);

    $_SESSION['usuario'] = $Usuario;
    $_SESSION['pagina'] = 'inicio';
    header("Location: index.php");
    exit;
} else {
    $_SESSION['pagina'] = 'registro'; //Establecemos la página en el login
    require_once $vistas['layout']; //Y cargamos el layout
}
