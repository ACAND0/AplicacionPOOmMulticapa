<?php
/**
 * Archivo cConsultarModificarDepartamento.php
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
    DescDepartamento => null,
    VolumenDeNegocio => null
];
//Creo el array con los errores
$aErrores = [
    DescDepartamento => null,
    VolumenDeNegocio => null
];

$Departamento = Departamento::buscaDepartamentosPorCodigo($_SESSION['CodigoDepartamento']);
$codigo = $Departamento->getCodDepartamento();
$descripcion = $Departamento->getDescDepartamento();
$volumen = $Departamento->getVolumenDeNegocio();
$fechaCreacion = $Departamento->getFechaCreacionDepartamento();
$fechaBaja = $Departamento->getFechaBajaDepartamento();


if (isset($_REQUEST['Aceptar'])) {
    //Valido las entradas
    $aErrores[DescDepartamento] = validacionFormularios::comprobarAlfanumerico($_REQUEST['DescDepartamento'], 255, 5, 1);
    $aErrores[VolumenDeNegocio] = validacionFormularios::comprobarEntero($_REQUEST['VolumenDeNegocio'], 100000, 100, 1);

    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }
}

if (isset($_REQUEST['Aceptar']) && $entradaOK) {
    $aRespuestas[DescDepartamento] = $_REQUEST['DescDepartamento'];
    $aRespuestas[VolumenDeNegocio] = $_REQUEST['VolumenDeNegocio'];

    $Departamento->modificaDepartamento($aRespuestas[VolumenDeNegocio], $aRespuestas[DescDepartamento]);
        $_SESSION['pagina'] = 'mtoDepartamentos';
        header("Location: index.php");
        exit;
    
} else {

    $_SESSION['pagina'] = 'consultarModificarDepartamento';
    require_once $vistas['layout'];
}
