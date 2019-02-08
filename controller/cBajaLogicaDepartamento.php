<?php

if (isset($_REQUEST['Cancelar'])) {
    $_SESSION['pagina'] = 'mtoDepartamentos';
    require_once $vistas["layout"];
    header("Location: index.php");
    exit;
}


$Departamento = Departamento::buscaDepartamentosPorCodigo($_SESSION['CodigoDepartamento']);
$codigo = $Departamento->getCodDepartamento();
$descripcion = $Departamento->getDescDepartamento();
$volumen = $Departamento->getVolumenDeNegocio();
$fechaCreacion = $Departamento->getFechaCreacionDepartamento();


if (isset($_REQUEST['Aceptar'])) {

    if ($Departamento->bajaLogicaDepartamento()) {
        $_SESSION['pagina'] = 'mtoDepartamentos';
        require_once $vistas["layout"];
        header("Location: index.php");
        exit;
    }
}




$_SESSION['pagina'] = 'bajaLogicaDepartamento';
require_once $vistas["layout"];
?>