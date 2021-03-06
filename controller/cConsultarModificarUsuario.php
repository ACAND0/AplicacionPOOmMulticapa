<?php
/**
 * Archivo cConsultarModificarUsuario.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */
if (isset($_REQUEST['Cancelar'])) {//Si se ha pulsado el botón cancelar
    $_SESSION['pagina'] = 'mtoUsuarios';
    header("Location: index.php");
    exit;
}


$entradaOK = true;
//Creo el array con las respuestas
$aRespuestas = [
    DescUsuario => null,
    Password => null,
    Perfil => null
];
//Creo el array con los errores
$aErrores = [
    DescUsuario => null,
    Password => null
];

$Usuario = Usuario::buscaUsuariosPorCodigo($_SESSION['CodigoUsuario']);
$codigo = $Usuario->getCodUsuario();
$descripcion = $Usuario->getDescUsuario();
$perfil = $Usuario->getPerfil();


if (isset($_REQUEST['Aceptar'])) {
    //Valido las entradas
    $aErrores[DescUsuario] = validacionFormularios::comprobarAlfanumerico($_REQUEST['DescUsuario'], 255, 5, 1);

    $aErrores[Password] = validacionFormularios::validarPassword($_REQUEST['Password'], 0, 5);


    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }
}


if (isset($_REQUEST['Aceptar']) && $entradaOK) {
    $aRespuestas[DescUsuario] = $_REQUEST['DescUsuario'];

    if(isset($_REQUEST['Password'])){
        $aRespuestas[Password] = $_REQUEST['Password'];
    }else{
        $aRespuestas[Password] = null;
    }

    $aRespuestas[Perfil] = $_REQUEST['Perfil'];

    $Usuario->modificarUsuario($aRespuestas[DescUsuario], $aRespuestas[Perfil], $aRespuestas[Password]);
    $_SESSION['pagina'] = 'mtoUsuarios';
    header("Location: index.php");
    exit;
} else {
    $_SESSION['pagina'] = 'consultarModificarUsuario';
    require_once $vistas['layout'];
}
