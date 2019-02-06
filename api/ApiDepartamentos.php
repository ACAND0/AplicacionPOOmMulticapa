<?php

require_once '../conf/configDB.php';
require_once '../model/Departamento.php';

$aDepartamento = [];
$codigo = $_GET[codigo];
$departamento = Departamento::buscaDepartamentosPorCodigo($codigo);

if ($departamento != null) {
    $aDepartamento['CodDepartamento'] = $departamento->getCodDepartamento();
    $aDepartamento['DescDepartamento'] = $departamento->getDescDepartamento();
    $aDepartamento['VolumenNegocio'] = $departamento->getVolumenDeNegocio();
    $aDepartamento['FechaCreacionDepartamento'] = $departamento->getFechaCreacionDepartamento();
} else {
    $aDepartamento['Error'] = 'Datos incorrectos';
}


header('Content-type: application/json');
echo json_encode($aDepartamento, JSON_PRETTY_PRINT);


?>