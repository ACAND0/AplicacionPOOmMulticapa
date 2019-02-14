<?php
/**
 * Archivo cMtoUsuarios.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    $_SESSION['buscarPorDesc'] = "";//Limpiamos la descripción    
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['limpiarBuscar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
    $_SESSION['buscarPorDesc'] = "";//Limpiamos la descripción        
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Importar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'importarUsuarios';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Exportar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'exportarUsuarios';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


//Abro la tabla que contendrá los datos de los departamentos en la vista


foreach ($_SESSION['aUsuarios'] as $key => $Usuario) {//Recorro los departamentos teniendo en cuenta su índice
    if (isset($_REQUEST['Borrar' . $key])) {//Si se ha pulsado el botón del departamento actual
        $_SESSION['CodigoUsuario'] = $Usuario->getCodUsuario(); //Establezco el código del departamento actual en la variable de session CodigoUsuario
        $_SESSION['pagina'] = 'eliminarUsuario'; //Y me voy a la respectiva vista de detalle
        header("Location: index.php");
        exit;
    }

    if (isset($_REQUEST['Editar' . $key])) {//Si se ha pulsado el botón del departamento actual
        $_SESSION['CodigoUsuario'] = $Usuario->getCodUsuario(); //Establezco el código del departamento actual en la variable de session CodigoUsuario
        $_SESSION['pagina'] = 'consultarModificarUsuario'; //Y me voy a la respectiva vista de detalle
        header("Location: index.php");
        exit;
    }
}




if (isset($_REQUEST['Buscar'])) {
    $_SESSION['buscarPorDesc'] = $_REQUEST['buscarPorDesc'];
}

//*****************************************DATOS SOBRE PAGINACIÓN************************//

//Recojo la página indicada por el usuario
if (isset($_REQUEST["pag"])) {
    $pagina = $_REQUEST["pag"];//Si se le ha indicado se asigna a la variable pagina el número de página
} else {
    $pagina = 1;//Si no se ha establecido ninguna página, se establece la página en 1 dando por hecho que el usuario no ha seleccionado ninguna página
}

$registrosPorPagina = 3; //Registros a mostrar por página
$numeroFilas = Usuario::contarUsuariosPorDesc($_SESSION['buscarPorDesc']); //Número de filas
$totalPaginas = ceil($numeroFilas / $registrosPorPagina); //Número de páginas
$primerRegistro = ($pagina - 1) * $registrosPorPagina; //Registro por el cual empieza a mostrar la página

//Recojo los departamentos actuales en una variable de sesión para que permanezca 
$_SESSION['aUsuarios'] = Usuario::buscaUsuariosPorDesc($_SESSION['buscarPorDesc'], $primerRegistro, $registrosPorPagina); //Devuelve array de objetos


$_SESSION['pagina'] = 'mtoUsuarios';
require_once $vistas['layout'];

?>





