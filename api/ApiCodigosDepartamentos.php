<?php

require_once '../conf/configDB.php';
require_once '../model/Departamento.php';

$aDept = [];

$aDepartamentos = Departamento::buscaDepartamentosPorDescripcion("", "Todos"); //Devuelve array de objetos
    if ($aDepartamentos) {
        foreach ($aDepartamentos as $Departamento) {
            $codigo = $Departamento->getCodDepartamento();
            array_push($aDept, $codigo);
        }
    }

header('Content-type: application/json');
echo json_encode($aDept, JSON_PRETTY_PRINT);
?>