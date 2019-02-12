<?php
/**
 * Archivo cMtoUsuarios.php
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */
$contador = 0; //Variable que utilizao para concatenar en el name de cada departamento para así
//poder referenciarlo y distinguirlo a la hora de utilizar los botones individuales de cada departamento como
//el de borrar

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['limpiarBuscar'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'mtoUsuarios';  //Vaciamos la variable SESSION del usuario
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

$descripcion = "";

if (isset($_REQUEST['Buscar'])) {
    $descripcion = $_REQUEST['buscarPorDesc'];
}

$aUsuarios = Usuario::buscaUsuariosPorDesc($descripcion);

foreach ($aUsuarios as $key => $Usuario) {//Recorro los departamentos teniendo en cuenta su índice
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


$_SESSION['pagina'] = 'mtoUsuarios';
require_once $vistas['layout'];







