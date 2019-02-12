<?php

/**
 * Archivo cWIP.php
 * 
 * Controlador del inicio, se encarga de comprobar que botones has podido pulsar y 
 * redireccionar y de cargar en variables los datos que mostraremos posterirmente en la vista
 * eliminando así la conexión de la vista con el modelo.
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package controller
 */


if (isset($_REQUEST['ATRAS'])) {//Si hemos pulsado salir
    $_SESSION['pagina'] = $_SESSION['paginaanterior'];
    header("Location: index.php"); //Y redireccionamos al index
    exit;
}


if (!isset($_SESSION['usuario'])) { //Si no existe un usaurio logueado
    header("Location: index.php"); //Redireccionamos al index
} else {
    $_SESSION['pagina'] = 'wip';
    require_once $vistas['layout'];
}