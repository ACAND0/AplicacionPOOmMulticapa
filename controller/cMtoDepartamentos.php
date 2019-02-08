<?php

$contador = 0; //Variable que utilizao para concatenar en el name de cada departamento para así
//poder referenciarlo y distinguirlo a la hora de utilizar los botones individuales de cada departamento como
//el de borrar

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
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Exportar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Añadir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'altaDepartamento';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Editar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}



//Abro la tabla que contendrá los datos de los departamentos en la vista
$criterioBusqueda = "Todos";
$descripcion = "";


if (isset($_REQUEST['Buscar'])) {
    $criterioBusqueda = $_REQUEST['criterioBusqueda'];
    $descripcion = $_REQUEST['buscarPorDesc'];
}

$aDepartamentos = Departamento::buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda); //Devuelve array de objetos


foreach ($aDepartamentos as $key => $Departamento) {//Recorro los departamentos teniendo en cuenta su índice
    if (isset($_REQUEST['Borrar' . $key])) {//Si se ha pulsado el botón del departamento actual
        $_SESSION['CodigoDepartamento'] = $Departamento->getCodDepartamento(); //Establezco el código del departamento actual en la variable de session CodigoUsuario
        $_SESSION['pagina'] = 'eliminarDepartamento'; //Y me voy a la respectiva vista de detalle
        header("Location: index.php");
        exit;
    }
    
    if (isset($_REQUEST['Editar' . $key])) {//Si se ha pulsado el botón del departamento actual
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