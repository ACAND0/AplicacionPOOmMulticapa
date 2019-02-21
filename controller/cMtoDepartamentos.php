<?php

/**
 * Archivo cMtoDepartamentos.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    //Al salir elimino las variables de busqueda
     $_SESSION['criterioBusqueda'] = "Todos"; //Limpiamos el criterio de búsqueda
    $_SESSION['buscarPorDesc'] = "";//Limpiamos la descripción
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['limpiarBuscar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['criterioBusqueda'] = ""; //Limpiamos el criterio de búsqueda
    $_SESSION['buscarPorDesc'] = "";//Limpiamos la descripción
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


foreach ($_SESSION['aDepartamentos'] as $key => $Departamento) {//Recorro los departamentos teniendo en cuenta su índice
       //$key = $key + $primerRegistro; //Con esto asigno al key su valor actual más el de la propia página

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

if (isset($_REQUEST['Buscar'])) {//Si se ha pulsado buscar establezco los valores recogiéndolos
    $_SESSION['criterioBusqueda'] = $_REQUEST['criterioBusqueda'];//Guardamos el criterio de búsqueda en la sesión para que se mantenga
    $_SESSION['buscarPorDesc'] = $_REQUEST['buscarPorDesc'];//Guardamos la búsqueda por descripción en la sesión para que se mantenga
}else{
    $_SESSION['criterioBusqueda'] = "Todos";
}

//*****************************************DATOS SOBRE PAGINACIÓN************************//

//Recojo la página indicada por el usuario
if (isset($_REQUEST["pag"])) {
    $pagina = $_REQUEST["pag"];//Si se le ha indicado se asigna a la variable pagina el número de página
} else {
    $pagina = 1;//Si no se ha establecido ninguna página, se establece la página en 1 dando por hecho que el usuario no ha seleccionado ninguna página
}

$registrosPorPagina = 3; //Registros a mostrar por página
$numeroFilas = Departamento::contarDepartamentosPorDesc($_SESSION['buscarPorDesc'], $_SESSION['criterioBusqueda']); //Número de filas
$totalPaginas = ceil($numeroFilas / $registrosPorPagina); //Número de páginas
$primerRegistro = ($pagina - 1) * $registrosPorPagina; //Registro por el cual empieza a mostrar la página

//Recojo los departamentos actuales en una variable de sesión para que permanezca 
$_SESSION['aDepartamentos'] = Departamento::buscaDepartamentosPorDescripcion($_SESSION['buscarPorDesc'], $_SESSION['criterioBusqueda'], $primerRegistro, $registrosPorPagina); //Devuelve array de objetos

/* Gráficos */
$depBaja = 0;
$depAlta = 0;
$numeroFilas = Departamento::contarDepartamentosPorDesc("", "Todos"); //Número de filas
$DepartamentosAltaBaja = Departamento::buscaDepartamentosPorDescripcion("", "Todos", 0, $numeroFilas);
foreach ($DepartamentosAltaBaja as $key => $Departamento) {
            if($Departamento->getFechaBajaDepartamento() == null){
                $depAlta++;
            }else{
                $depBaja++;
            }
}

$_SESSION['pagina'] = 'mtoDepartamentos';
require_once $vistas['layout'];
?>