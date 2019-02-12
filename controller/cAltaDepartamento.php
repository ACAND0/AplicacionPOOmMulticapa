<?php
/**
 * Archivo cAltaDepartamento.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */
if (isset($_REQUEST['Cancelar'])) {//Si se ha pulsado el botón cancelar
    $_SESSION['pagina'] = 'mtoDepartamentos';
    header("Location: index.php");
    exit;
}



$entradaOK = true;
//Creo el array con las respuestas
$aRespuestas = [
    CodDepartamento => null,
    DescDepartamento => null,
    VolumenDeNegocio => null
];
//Creo el array con los errores
$aErrores = [
    CodDepartamento => null,
    DescDepartamento => null,
    VolumenDeNegocio => null
];


if (isset($_REQUEST['Aceptar'])) {
    //Valido las entradas
    $aErrores[CodDepartamento] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'], 3, 3, 1);
    $aErrores[DescDepartamento] = validacionFormularios::comprobarAlfanumerico($_REQUEST['DescDepartamento'], 255, 5, 1);
    $aErrores[VolumenDeNegocio] = validacionFormularios::comprobarEntero($_REQUEST['VolumenDeNegocio'], 100000, 100, 1);

   

    if (Departamento::validaCodNoExiste($_REQUEST['CodDepartamento'])) {
        $aErrores[CodDepartamento] = "Ese código de departamento ya existe, seleccione otro por favor.";
    }

    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }
}


if (isset($_REQUEST['Aceptar']) && $entradaOK) {

    $aRespuestas[CodDepartamento] = $_REQUEST['CodDepartamento'];
    $aRespuestas[DescDepartamento] = $_REQUEST['DescDepartamento'];
    $aRespuestas[VolumenDeNegocio] = $_REQUEST['VolumenDeNegocio'];

    if (Departamento::altaDepartamento($aRespuestas[CodDepartamento], $aRespuestas[DescDepartamento], $aRespuestas[VolumenDeNegocio])) {
        $_SESSION['pagina'] = 'mtoDepartamentos';
        header("Location: index.php");
        exit;
    }
} else {

    $_SESSION['pagina'] = 'altaDepartamento';
    require_once $vistas['layout'];
}

