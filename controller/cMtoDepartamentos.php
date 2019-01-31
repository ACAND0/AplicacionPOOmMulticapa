<?php

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = 'inicio';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Importar'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}



if (isset($_REQUEST['limpiarBuscar'])) {//Si hemos pulsado salir
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
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

if (isset($_REQUEST['Salir'])) {//Si hemos pulsado salir
    $_SESSION['paginaanterior'] = 'mtoDepartamentos';  //Vaciamos la variable SESSION del usuario
    $_SESSION['pagina'] = 'wip';  //Vaciamos la variable SESSION del usuario
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}

$_SESSION['pagina'] = 'mtoDepartamentos';
require_once $vistas['layout'];
