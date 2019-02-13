<?php

require_once '../conf/configDB.php';
require_once '../model/Departamento.php';

$aDept = [];
$numDepartamentos = Departamento::contarDepartamentosPorDesc("", "Todos");
$aDepartamentos = Departamento::buscaDepartamentosPorDescripcion("", "Todos",0,$numDepartamentos); //Devuelve array de objetos
    if ($aDepartamentos) {
        foreach ($aDepartamentos as $Departamento) {
            $codigo = $Departamento->getCodDepartamento();
            array_push($aDept, $codigo);
        }
    }

header('Content-type: application/json');
echo json_encode($aDept, JSON_PRETTY_PRINT);
?>