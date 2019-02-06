<?php

//Incluimos las configuraciones pertinentes
require_once "conf/confAplicacion.php";

// Estas tres líneas inferiroes se utilizan para activar los errores en toda la aplicación
// 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start(); //Recuperamos la sesión

if (isset($_SESSION['usuario'])) {
    $controlador = $controladores['inicio'];
}
if (isset($_SESSION['pagina'])) {
    $controlador = $controladores[$_SESSION['pagina']];
} else {
    $controlador = $controladores['login'];
}

require_once $controlador;
