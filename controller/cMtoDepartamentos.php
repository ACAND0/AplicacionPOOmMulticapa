<?php

/**
 * Archivo cMtoDepartamentos.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */
$contador = 0; //Variable que utilizao para concatenar en el name de cada departamento para así
//poder referenciarlo y distinguirlo a la hora de utilizar los botones individuales de cada departamento como
//el de borrar
$registrosPorPagina = 3; //Número de registros mostrados por página
if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['limpiarBuscar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Importar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'importarDepartamentos';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Exportar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'exportarDepartamentos';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Añadir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'altaDepartamento';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}



//Abro la tabla que contendrá los datos de los departamentos en la vista
$criterioBusqueda = "Todos"; //Valor por defecto si no se ha pulsado buscar
$descripcion = ""; //Valor por defecto si no se ha pulsado buscar
//*****************************************DATOS SOBRE PAGINACIÓN************************//
//Recojo la página indicada por el usuario
if (isset($_REQUEST["pag"])) {
    $pagina = $_REQUEST["pag"];//Si se le ha indicado se asigna a la variable pagina el número de página
} else {
    $pagina = 1;//Si no se ha establecido ninguna página, se establece la página en 1 dando por hecho que el usuario no ha seleccionado ninguna página

}



if (isset($_REQUEST['Buscar'])) {
    $criterioBusqueda = $_REQUEST['criterioBusqueda'];
    $descripcion = $_REQUEST['buscarPorDesc'];
}

$registrosPorPagina = 3; //Registros a mostrar por página

$numeroFilas = Departamento::contarDepartamentosPorDesc($descripcion, $criterioBusqueda); //Número de filas
$totalPaginas = ceil($numeroFilas / $registrosPorPagina); //Número de páginas
$primerRegistro = ($pagina - 1) * $registrosPorPagina; //Registro por el cual empieza a mostrar la página


//echo "<br>".$primerRegistro."<br>";
//echo $registrosPorPagina."<br>";

$aDepartamentos = Departamento::buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda, $primerRegistro, $registrosPorPagina); //Devuelve array de objetos


foreach ($aDepartamentos as $key => $Departamento) {//Recorro los departamentos teniendo en cuenta su índice
       $key = $key + $primerRegistro; //Con esto asigno al key su valor actual más el de la propia página

//    echo 'Borrar' . $key;
    if (isset($_REQUEST['Borrar' . $key])) {//Si se ha pulsado el botón del departamento actual
        $_SESSION['CodigoDepartamento'] = $Departamento->getCodDepartamento(); //Establezco el código del departamento actual en la variable de session CodigoUsuario
        $_SESSION['pagina'] = 'eliminarDepartamento'; //Y me voy a la respectiva vista de detalle
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['Editar'.$key])) {//Si se ha pulsado el botón del departamento actual
        $_SESSION['CodigoDepartamento'] = $Departamento->getCodDepartamento(); //Establezco el código del departamento actual en la variable de session CodigoUsuario
        $_SESSION['pagina'] = 'consultarModificarDepartamento'; //Y me voy a la respectiva vista de detalle
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['Baja' . $key])) {//Si se ha pulsado el botón del departamento actual
        $_SESSION['CodigoDepartamento'] = $Departamento->getCodDepartamento(); //Establezco el código del departamento actual en la variable de session CodigoUsuario
        $_SESSION['pagina'] = 'bajaLogicaDepartamento'; //Y me voy a la respectiva vista de detalle
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['Rehabilitar' . $key])) {//Si se ha pulsado el botón del departamento actual
        $_SESSION['CodigoDepartamento'] = $Departamento->getCodDepartamento(); //Establezco el código del departamento actual en la variable de session CodigoUsuario
        $_SESSION['pagina'] = 'rehabilitacionDepartamento'; //Y me voy a la respectiva vista de detalle
        header("Location: index.php");
        exit;
    }
}


$_SESSION['pagina'] = 'mtoDepartamentos';
require_once $vistas['layout'];
?>