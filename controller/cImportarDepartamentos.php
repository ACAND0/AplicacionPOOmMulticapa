<?php
/**
 * Archivo cImportarDepartamentos.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */
if (isset($_REQUEST['Cancelar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

$todoOkey = true;
$fallos = 0;
$fichero = "tmp/datosDepartamentos.json";

$json = file_get_contents($fichero); //Recojo el fichero JSON en una variable

if ($json == false) {//Si no se ha podido encontrar mostraremos un error
    echo '<h3 style=color:red>No se ha podido abrir el archivo JSON</h3>';
} else {//Si se ha recogido correctamente
    $Departamentos = json_decode($json, true); //Decodifico el fichero json en un array

    foreach ($Departamentos as $Departamento) {//Recorro el array json por filas
        $codigo = $Departamento['CodDepartamento'];

        //Si ya existe un departamento con este codigo mostrará un error
        if (Departamento::validaCodNoExiste($codigo)) {
            $todoOkey = false;
            $fallos++;
            echo "<a style=color:red>El departamento con el código $codigo ya existe, por lo que no se ha importado.</a><br>";
        } else {//Si el departamento no existe en la base de datos procedemos a insertarlo
            Departamento::importarDepartamento($codigo, $Departamento['DescDepartamento'], $Departamento['FechaCreacionDepartamento'], $Departamento['VolumenDeNegocio'], $Departamento['FechaBajaDepartamento']);
            echo "<a style=color:green>Departamento " . $codigo . " importado correctamente</a><br>";
        }
    }
}

if ($todoOkey) {
    echo '<h3 style=color:green>Se han importado todos los archivos del fichero ' . $fichero . '</h3>';
} else {
    echo '<h3 style=color:red>No se han podido insertar ' . $fallos . ' departamentos del fichero ' . $fichero . ' </h3>';
}

$_SESSION['pagina'] = 'importarDepartamentos';
require_once $vistas['layout'];
